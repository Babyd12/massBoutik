<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StockRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $stocks = Stock::paginate();

        return view('stock.index', compact('stocks'))
            ->with('i', ($request->input('page', 1) - 1) * $stocks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $stock = new Stock();

        return view('stock.create', compact('stock'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StockRequest $request): RedirectResponse
    {
        Stock::create($request->validated());

        return Redirect::route('stocks.index')
            ->with('success', 'Stock created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $stock = Stock::find($id);

        return view('stock.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $stock = Stock::find($id);

        return view('stock.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StockRequest $request, Stock $stock): RedirectResponse
    {
        $stock->update($request->validated());

        return Redirect::route('stocks.index')
            ->with('success', 'Stock updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Stock::find($id)->delete();

        return Redirect::route('stocks.index')
            ->with('success', 'Stock deleted successfully');
    }
}
