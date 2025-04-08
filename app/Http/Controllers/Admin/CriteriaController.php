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
            'name' => 'required|unique:criterias',
            'label' => 'required',
            'type' => 'required|in:benefit,cost',
        ]);

        Criteria::create($request->all());
        return redirect()->route('admin.criteria.index')->with('success', 'Kriteria berhasil ditambahkan');
    }

    public function edit(Criteria $criterion) // Laravel akan mengharapkan nama parameter 'criterion'
    {
        return view('admin.criteria.edit', ['criteria' => $criterion]);
    }

    public function update(Request $request, Criteria $criterion) // Laravel akan mengharapkan nama parameter 'criterion'
    {
        $request->validate([
            'name' => 'required',
            'label' => 'required',
            'type' => 'required|in:benefit,cost',
        ]);

        $criterion->update($request->all());
        return redirect()->route('admin.criteria.index')->with('success', 'Kriteria berhasil diperbarui');
    }

    public function destroy(Criteria $criterion) // Laravel akan mengharapkan nama parameter 'criterion'
    {
        $criterion->delete();
        return redirect()->route('admin.criteria.index')->with('success', 'Kriteria berhasil dihapus');
    }
}
