<?php

namespace App\Http\Controllers;

use App\Models\Handphone;
use Illuminate\Http\Request;

class HandphoneController extends Controller
{
    public function index(Request $request)
    {
        $query = Handphone::with('specification');

        // Filter by price range
        if ($request->filled('price_range')) {
            switch ($request->price_range) {
                case 'budget':
                    $query->where('price', '<', 2000000);
                    break;
                case 'entry':
                    $query->whereBetween('price', [2000000, 4000000]);
                    break;
                case 'mid':
                    $query->whereBetween('price', [4000000, 8000000]);
                    break;
                case 'premium':
                    $query->where('price', '>', 8000000);
                    break;
            }
        }

        // Filter by feature
        if ($request->filled('feature')) {
            switch ($request->feature) {
                case 'camera':
                    $query->where('camera', '>=', 8);
                    break;
                case 'battery':
                    $query->where('battery', '>=', 8);
                    break;
                case 'ram':
                    $query->where('ram', '>=', 8);
                    break;
            }
        }

        // Sort results
        if ($request->filled('sort_by')) {
            switch ($request->sort_by) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    $query->orderBy('price', 'asc');
            }
        } else {
            $query->orderBy('price', 'asc');
        }

        $handphones = $query->paginate(9);

        return view('handphone.index', compact('handphones'));
    }

    public function create()
    {
        return view('handphone.create');
    }

    public function store(Request $request)
    {
        // Validate and store the handphone data
        // Redirect or return a response
    }

    public function show($id)
    {

        $handphone = Handphone::with('specification')->findOrFail($id);

        // Get similar phones
        $similarPhones = Handphone::where('id', '!=', $id)
            ->whereBetween('price', [$handphone->price * 0.8, $handphone->price * 1.2])
            ->take(3)
            ->get();

        return view('handphone.detail', compact('handphone', 'similarPhones'));
    }

    public function edit($id)
    {
        // Edit a specific handphone
    }

    public function update(Request $request, $id)
    {
        // Update the handphone data
    }

    public function destroy($id)
    {
        // Delete the handphone
    }
}
