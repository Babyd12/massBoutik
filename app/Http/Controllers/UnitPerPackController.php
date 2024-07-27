<?php

namespace App\Http\Controllers;

use App\Models\UnitPerPack;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UnitPerPackRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UnitPerPackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $unitPerPacks = UnitPerPack::paginate();

        return view('admin.unit-per-pack.index', compact('unitPerPacks'))
            ->with('i', ($request->input('page', 1) - 1) * $unitPerPacks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $unitPerPack = new UnitPerPack();

        return view('admin.unit-per-pack.create', compact('unitPerPack'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitPerPackRequest $request): RedirectResponse
    {
        UnitPerPack::create($request->validated());

        return Redirect::route('unit-per-packs.index')
            ->with('success', 'UnitPerPack created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $unitPerPack = UnitPerPack::find($id);

        return view('admin.unit-per-pack.show', compact('unitPerPack'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $unitPerPack = UnitPerPack::find($id);

        return view('admin.unit-per-pack.edit', compact('unitPerPack'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnitPerPackRequest $request, UnitPerPack $unitPerPack): RedirectResponse
    {
        $unitPerPack->update($request->validated());

        return Redirect::route('unit-per-packs.index')
            ->with('success', 'UnitPerPack updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        UnitPerPack::find($id)->delete();

        return Redirect::route('unit-per-packs.index')
            ->with('success', 'UnitPerPack deleted successfully');
    }
}
