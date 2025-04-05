<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        return view('admin.criteria.index', compact('criterias'));
    }

    public function create()
    {
        return view('admin.criteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:criteria',
            'label' => 'required',
            'type' => 'required|in:benefit,cost',
        ]);

        Criteria::create($request->all());
        return redirect()->route('criteria.index')->with('success', 'Kriteria berhasil ditambahkan');
    }

    public function edit(Criteria $criteria)
    {
        return view('admin.criteria.edit', compact('criteria'));
    }

    public function update(Request $request, Criteria $criteria)
    {
        $request->validate([
            'name' => 'required',
            'label' => 'required',
            'type' => 'required|in:benefit,cost',
        ]);

        $criteria->update($request->all());
        return redirect()->route('criteria.index')->with('success', 'Kriteria berhasil diperbarui');
    }

    public function destroy(Criteria $criteria)
    {
        $criteria->delete();
        return back()->with('success', 'Kriteria berhasil dihapus');
    }
}
