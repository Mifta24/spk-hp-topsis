<?php

namespace App\Http\Controllers;

use App\Models\Handphone;
use Illuminate\Http\Request;

class HandphoneController extends Controller
{
    public function index(Request $request)
    {
        // Start with a base query
        $query = Handphone::query()
            ->with(['specification', 'brand']);

        // Search functionality
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('brand', function($brandQuery) use ($searchTerm) {
                      $brandQuery->where('name', 'like', '%' . $searchTerm . '%');
                  });
            });
        }

        // Brand filter
        if ($request->has('brand') && $request->brand) {
            $query->where('brand_id', $request->brand);
        }

        // Price range filter (existing code)
        if ($request->has('price_range') && $request->price_range) {
            switch ($request->price_range) {
                case 'budget':
                    $query->where('price', '<', 2000000);
                    break;
                case 'entry':
                    $query->whereBetween('price', [2000000, 3999999]);
                    break;
                case 'mid':
                    $query->whereBetween('price', [4000000, 7999999]);
                    break;
                case 'premium':
                    $query->where('price', '>=', 8000000);
                    break;
            }
        }

        // Feature filter (existing code)
        if ($request->has('feature') && $request->feature) {
            switch ($request->feature) {
                case 'camera':
                    $query->where('camera', '>=', 9);
                    break;
                case 'battery':
                    $query->where('battery', '>=', 9);
                    break;
                case 'ram':
                    $query->where('ram', '>=', 9);
                    break;
                case 'storage':
                    $query->where('storage', '>=', 9);
                    break;
                case 'peformance':
                    $query->where('processor', '>=', 9);
                    break;
                case 'design':
                    $query->where('design', '>=', 9);
                    break;
            }
        }

        // Sorting (existing code)
        if ($request->has('sort_by') && $request->sort_by) {
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
                    $query->orderBy('id', 'desc');
                    break;
            }
        } else {
            // Default sorting
            $query->orderBy('id', 'desc');
        }

        $handphones = $query->paginate(12);

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

        return view('handphone.show', compact('handphone', 'similarPhones'));
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
