<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function index(Request $request)
    {
        $minPrice = $request->min_price;
        $maxPrice = $request->max_price;
        $rawWeights = $request->criteria;

        // 1. Normalisasi bobot
        $total = array_sum($rawWeights);
        $weights = [];
        foreach ($rawWeights as $key => $value) {
            $weights[$key] = $value / $total;
        }

        // 2. Ambil data handphone yang sesuai range harga
        $handphones = Handphone::whereBetween('price', [$minPrice, $maxPrice])->get();

        // 3. Lanjut ke proses TOPSIS (akan kita buat di bagian selanjutnya)
        $result = $this->topsis($handphones, $weights);

        return view('recommendation.result', compact('result'));
    }

    private function topsis($handphones, $weights)
    {
        // 1. Ambil nama-nama kriteria
        $criteriaKeys = array_keys($weights);

        // 2. Buat matriks keputusan
        $matrix = [];
        foreach ($handphones as $hp) {
            $row = [];
            foreach ($criteriaKeys as $key) {
                $row[$key] = $hp->$key;
            }
            $matrix[$hp->id] = $row;
        }

        // 3. Normalisasi matriks
        $normalizationDivisor = [];
        foreach ($criteriaKeys as $key) {
            $normalizationDivisor[$key] = sqrt(array_sum(array_map(fn($row) => pow($row[$key], 2), $matrix)));
        }

        $normalizedMatrix = [];
        foreach ($matrix as $id => $row) {
            foreach ($criteriaKeys as $key) {
                $normalizedMatrix[$id][$key] = $row[$key] / $normalizationDivisor[$key];
            }
        }

        // 4. Kalikan dengan bobot
        $weightedMatrix = [];
        foreach ($normalizedMatrix as $id => $row) {
            foreach ($criteriaKeys as $key) {
                $weightedMatrix[$id][$key] = $row[$key] * $weights[$key];
            }
        }

        // 5. Solusi ideal positif dan negatif
        $idealPositive = [];
        $idealNegative = [];

        foreach ($criteriaKeys as $key) {
            $values = array_column($weightedMatrix, $key);
            $idealPositive[$key] = max($values); // asumsi semua benefit
            $idealNegative[$key] = min($values); // asumsi semua benefit
        }

        // 6. Hitung jarak ke solusi ideal
        $distancePositive = [];
        $distanceNegative = [];

        foreach ($weightedMatrix as $id => $row) {
            $dp = 0;
            $dn = 0;
            foreach ($criteriaKeys as $key) {
                $dp += pow($row[$key] - $idealPositive[$key], 2);
                $dn += pow($row[$key] - $idealNegative[$key], 2);
            }
            $distancePositive[$id] = sqrt($dp);
            $distanceNegative[$id] = sqrt($dn);
        }

        // 7. Hitung skor preferensi
        $scores = [];
        foreach ($distancePositive as $id => $dPlus) {
            $dMinus = $distanceNegative[$id];
            $scores[$id] = $dMinus / ($dPlus + $dMinus);
        }

        // 8. Gabungkan skor ke handphone dan urutkan
        $result = $handphones->map(function ($hp) use ($scores) {
            $hp->score = $scores[$hp->id] ?? 0;
            return $hp;
        })->sortByDesc('score')->values();

        return $result;
    }
}
