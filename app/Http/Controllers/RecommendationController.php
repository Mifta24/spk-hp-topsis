<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Handphone;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        return view('recommendation.form', compact('criterias'));
    }

    public function result(Request $request)
    {
        // Validasi input
        $request->validate([
            'min_price' => 'required|numeric|min:0',
            'max_price' => 'required|numeric|gt:min_price',
            'weights' => 'required|array',
        ]);

        $weights = $request->input('weights');
        $totalWeight = array_sum($weights);

        // Validasi total bobot mendekati 1
        if (abs($totalWeight - 1) > 0.01) {
            return back()->withErrors(['weights' => 'Jumlah total bobot harus = 1. Saat ini: ' . $totalWeight])
                        ->withInput();
        }

        $min = $request->input('min_price');
        $max = $request->input('max_price');

        $handphones = Handphone::whereBetween('price', [$min, $max])->get();

        if ($handphones->isEmpty()) {
            return back()->withErrors(['price' => 'Tidak ada handphone dalam rentang harga tersebut'])
                        ->withInput();
        }

        $result = $this->topsis($handphones, $weights);

        return view('recommendation.result', compact('result', 'weights'));
    }

    private function topsis($handphones, $weights)
    {
        $criterias = Criteria::all();
        $criteriaNames = $criterias->pluck('name')->toArray();

        // Bentuk matrix awal
        $matrix = [];
        foreach ($handphones as $hp) {
            $row = [];
            foreach ($criteriaNames as $name) {
                $row[$name] = $hp->$name;
            }
            $row['id'] = $hp->id;
            $row['name'] = $hp->name;
            $row['price'] = $hp->price;
            $matrix[] = $row;
        }

        // Normalisasi matrix
        $normal = [];
        foreach ($criteriaNames as $name) {
            $sumSquares = array_reduce($matrix, fn($carry, $row) => $carry + pow($row[$name], 2), 0);
            $denominator = sqrt($sumSquares);
            foreach ($matrix as $i => $row) {
                $normal[$i][$name] = $denominator ? $row[$name] / $denominator : 0;
            }
        }

        // Bobot normalisasi
        foreach ($normal as $i => $row) {
            foreach ($criteriaNames as $name) {
                $normal[$i][$name] *= $weights[$name];
            }
        }

        // Solusi ideal positif & negatif
        $positiveIdeal = [];
        $negativeIdeal = [];
        foreach ($criteriaNames as $name) {
            $values = array_column($normal, $name);
            $type = $criterias->firstWhere('name', $name)->type;
            $positiveIdeal[$name] = $type === 'benefit' ? max($values) : min($values);
            $negativeIdeal[$name] = $type === 'benefit' ? min($values) : max($values);
        }

        // Jarak ke solusi ideal
        $results = [];
        foreach ($normal as $i => $row) {
            $dPlus = 0;
            $dMin = 0;
            foreach ($criteriaNames as $name) {
                $dPlus += pow($row[$name] - $positiveIdeal[$name], 2);
                $dMin += pow($row[$name] - $negativeIdeal[$name], 2);
            }
            $dPlus = sqrt($dPlus);
            $dMin = sqrt($dMin);
            $score = $dMin / ($dPlus + $dMin);

            $results[] = [
                'id' => $matrix[$i]['id'],
                'name' => $matrix[$i]['name'],
                'price' => $matrix[$i]['price'],
                'score' => $score,
                'normalized_values' => array_intersect_key($normal[$i], array_flip($criteriaNames)),
                'd_plus' => $dPlus,
                'd_min' => $dMin
            ];
        }

        // Urutkan hasil dari skor tertinggi
        usort($results, fn($a, $b) => $b['score'] <=> $a['score']);

        return $results;
    }
}
