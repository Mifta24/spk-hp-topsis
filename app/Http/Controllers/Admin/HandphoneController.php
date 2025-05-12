<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\Handphone;
use App\Models\HandphoneSpecification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HandphoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Handphone::with('specification');

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        // Sorting
        $sort = $request->sort ?? 'name';
        $direction = $request->direction ?? 'asc';

        if ($sort === 'price') {
            $query->orderBy('price', $direction);
        } elseif ($sort === 'camera') {
            $query->orderBy('camera', $direction);
        } elseif ($sort === 'battery') {
            $query->orderBy('battery', $direction);
        } elseif ($sort === 'ram') {
            $query->orderBy('ram', $direction);
        } else {
            $query->orderBy('name', $direction);
        }

        $handphones = $query->paginate(10)->withQueryString();

        return view('admin.handphone.index', compact('handphones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $criterias = Criteria::all();
        return view('admin.handphone.create', compact('criterias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'brand_id' => 'required|exists:brands,id',
            'camera' => 'required|integer|min:1|max:10',
            'battery' => 'required|integer|min:1|max:10',
            'ram' => 'required|integer|min:1|max:10',
            'prosessor' => 'required|integer|min:1|max:10',
            'design' => 'required|integer|min:1|max:10',
            'storage' => 'required|integer|min:1|max:10',
            'processor_name' => 'required|string|max:255',
            'camera_detail' => 'required|string|max:255',
            'battery_capacity' => 'required|string|max:255',
            'ram_size' => 'required|string|max:255',
            'storage_size' => 'required|string|max:255',
            'screen_size' => 'required|string|max:255',
            'os_version' => 'required|string|max:255',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image' => 'nullable|string',
            'colors' => 'required|array',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create handphone
        $handphone = Handphone::create([
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'price' => $request->price,
            'camera' => $request->camera,
            'battery' => $request->battery,
            'ram' => $request->ram,
            'prosessor' => $request->prosessor,
            'design' => $request->design,
            'storage' => $request->storage,
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/handphones', $imageName);
            $imagePath = asset('storage/handphones/' . $imageName);
        }

        // Create specification
        HandphoneSpecification::create([
            'handphone_id' => $handphone->id,
            'image' => $imagePath ?? $request->image_url,
            'processor_name' => $request->processor_name,
            'camera_detail' => $request->camera_detail,
            'battery_capacity' => $request->battery_capacity,
            'ram_size' => $request->ram_size,
            'storage_size' => $request->storage_size,
            'screen_size' => $request->screen_size,
            'os_version' => $request->os_version,
            'network' => $request->network ?? '4G LTE, 5G',
            'sim' => $request->sim ?? 'Dual SIM (Nano-SIM)',
            'weight' => $request->weight ?? '200 g',
            'dimensions' => $request->dimensions ?? '160 x 75 x 8 mm',
            'colors' => json_encode($request->colors),
            'features' => json_encode($request->features ?? []),
            'description' => $request->description,
        ]);

        return redirect()->route('admin.handphone.index')
            ->with('success', 'Handphone added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $handphone = Handphone::with('specification')->findOrFail($id);
        return view('admin.handphone.show', compact('handphone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $handphone = Handphone::with('specification')->findOrFail($id);
        $criterias = Criteria::all();
        return view('admin.handphone.edit', compact('handphone', 'criterias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'brand_id' => 'required|exists:brands,id',
            'camera' => 'required|integer|min:1|max:10',
            'battery' => 'required|integer|min:1|max:10',
            'ram' => 'required|integer|min:1|max:10',
            'prosessor' => 'required|integer|min:1|max:10',
            'design' => 'required|integer|min:1|max:10',
            'storage' => 'required|integer|min:1|max:10',
            'processor_name' => 'required|string|max:255',
            'camera_detail' => 'required|string|max:255',
            'battery_capacity' => 'required|string|max:255',
            'ram_size' => 'required|string|max:255',
            'storage_size' => 'required|string|max:255',
            'screen_size' => 'required|string|max:255',
            'os_version' => 'required|string|max:255',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'image' => 'required|string',
            'colors' => 'required|array',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $handphone = Handphone::findOrFail($id);

        // Update handphone
        $handphone->update([
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'price' => $request->price,
            'camera' => $request->camera,
            'battery' => $request->battery,
            'ram' => $request->ram,
            'prosessor' => $request->prosessor,
            'design' => $request->design,
            'storage' => $request->storage,
        ]);

        // Get specification
        $specification = $handphone->specification;
        if (!$specification) {
            return redirect()->back()->with('error', 'Specification not found');
        }

        // Handle image upload
        $imagePath = $specification->image;
        if ($request->hasFile('image')) {
            // Delete old image if it exists and is a local file
            if ($specification->image && str_contains($specification->image, 'storage/handphones')) {
                $oldImage = str_replace(asset('storage/'), 'public/', $specification->image);
                Storage::delete($oldImage);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/handphones', $imageName);
            $imagePath = asset('storage/handphones/' . $imageName);
        } elseif ($request->image_url) {
            $imagePath = $request->image_url;
        }

        // Update specification
        $specification->update([
            'image' => $imagePath,
            'processor_name' => $request->processor_name,
            'camera_detail' => $request->camera_detail,
            'battery_capacity' => $request->battery_capacity,
            'ram_size' => $request->ram_size,
            'storage_size' => $request->storage_size,
            'screen_size' => $request->screen_size,
            'os_version' => $request->os_version,
            'network' => $request->network ?? $specification->network,
            'sim' => $request->sim ?? $specification->sim,
            'weight' => $request->weight ?? $specification->weight,
            'dimensions' => $request->dimensions ?? $specification->dimensions,
            'colors' => json_encode($request->colors),
            'features' => json_encode($request->features ?? []),
            'description' => $request->description,
        ]);

        return redirect()->route('admin.handphone.index')
            ->with('success', 'Handphone updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $handphone = Handphone::with('specification')->findOrFail($id);

        // Delete image if it's a local file
        if ($handphone->specification && $handphone->specification->image) {
            if (str_contains($handphone->specification->image, 'storage/handphones')) {
                $image = str_replace(asset('storage/'), 'public/', $handphone->specification->image);
                Storage::delete($image);
            }
        }

        // Delete specification first (to avoid foreign key constraint)
        if ($handphone->specification) {
            $handphone->specification->delete();
        }

        // Delete handphone
        $handphone->delete();

        return redirect()->route('admin.handphone.index')
            ->with('success', 'Handphone deleted successfully');
    }
}
