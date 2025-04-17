<?php

namespace App\Http\Controllers;

use App\Models\Handphone;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index(Request $request)
    {
        $compareIds = session('compare_ids', []);
        $handphones = [];

        // Ambil data handphone dari ID yang disimpan di session
        if (!empty($compareIds)) {
            $handphones = Handphone::with(['specification', 'brand'])
                ->whereIn('id', $compareIds)
                ->get();
        }

        // Dapatkan rekomendasi handphone terbaru jika perbandingan kosong
        $recentHandphones = Handphone::with(['specification', 'brand'])
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

        return view('compare.index', compact('handphones', 'recentHandphones'));
    }

    public function add($id)
    {
        $compareIds = session('compare_ids', []);

        // Cek jika handphone sudah ada dalam perbandingan
        if (!in_array($id, $compareIds)) {
            // Batasi jumlah maksimal handphone yang bisa dibandingkan
            if (count($compareIds) >= 3) {
                return redirect()->back()->with('error', 'Maksimal 3 handphone yang dapat dibandingkan sekaligus');
            }

            // Tambahkan id handphone ke session
            $compareIds[] = $id;
            session(['compare_ids' => $compareIds]);

            return redirect()->back()->with('success', 'Handphone ditambahkan ke perbandingan');
        }

        return redirect()->back()->with('info', 'Handphone sudah ada dalam perbandingan');
    }

    public function remove($id)
    {
        $compareIds = session('compare_ids', []);

        // Hapus id handphone dari session
        $compareIds = array_diff($compareIds, [$id]);
        session(['compare_ids' => $compareIds]);

        return redirect()->route('compare.index')->with('success', 'Handphone dihapus dari perbandingan');
    }

    public function clear()
    {
        // Hapus semua id handphone dari session
        session()->forget('compare_ids');

        return redirect()->route('compare.index')->with('success', 'Daftar perbandingan berhasil dikosongkan');
    }
}
