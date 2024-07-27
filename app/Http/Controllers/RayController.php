<?php

namespace App\Http\Controllers;

use App\Models\Ray;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RayRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $rays = Ray::paginate();

        return view('admin.ray.index', compact('rays'))
            ->with('i', ($request->input('page', 1) - 1) * $rays->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $ray = new Ray();

        return view('admin.ray.create', compact('ray'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RayRequest $request): RedirectResponse
    {
        Ray::create($request->validated());

        return Redirect::route('rays.index')
            ->with('success', 'Ray created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $ray = Ray::find($id);

        return view('admin.ray.show', compact('ray'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $ray = Ray::find($id);

        return view('admin.ray.edit', compact('ray'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RayRequest $request, Ray $ray): RedirectResponse
    {
        $ray->update($request->validated());

        return Redirect::route('rays.index')
            ->with('success', 'Ray updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Ray::find($id)->delete();

        return Redirect::route('rays.index')
            ->with('success', 'Ray deleted successfully');
    }
}
