<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Brand::query()->withCount('handphones');

        // Handle search
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('slug', 'like', '%' . $searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        $brands = $query->orderBy('name')->paginate(10);

        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:brands',
            'slug' => 'nullable|max:255|unique:brands',
            'logo' => 'nullable|url|max:255',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Set default value for is_active
        $validated['is_active'] = isset($validated['is_active']) ? true : false;

        $brand = Brand::create($validated);

        return redirect()->route('admin.brand.show', $brand)
            ->with('success', 'Brand berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        $brand->load(['handphones' => function ($query) {
            $query->orderBy('price', 'desc');
        }]);

        return view('admin.brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $brand->loadCount('handphones');
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:brands,name,'.$brand->id,
            'slug' => 'nullable|max:255|unique:brands,slug,'.$brand->id,
            'logo' => 'nullable|url|max:255',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Set default value for is_active
        $validated['is_active'] = isset($validated['is_active']) ? true : false;

        $brand->update($validated);

        return redirect()->route('admin.brand.show', $brand)
            ->with('success', 'Brand berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        // Check if brand has handphones
        $handphonesCount = $brand->handphones()->count();

        if ($handphonesCount > 0) {
            return redirect()->back()->with('error', 'Brand tidak dapat dihapus karena masih memiliki ' . $handphonesCount . ' handphone terkait.');
        }

        $brand->delete();

        return redirect()->route('admin.brand.index')
            ->with('success', 'Brand berhasil dihapus!');
    }
}
