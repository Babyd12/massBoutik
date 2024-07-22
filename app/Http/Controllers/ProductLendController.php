<?php

namespace App\Http\Controllers;

use App\Models\ProductLend;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductLendRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductLendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productLends = ProductLend::paginate();

        return view('product-lend.index', compact('productLends'))
            ->with('i', ($request->input('page', 1) - 1) * $productLends->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $productLend = new ProductLend();

        return view('product-lend.create', compact('productLend'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductLendRequest $request): RedirectResponse
    {
        ProductLend::create($request->validated());

        return Redirect::route('product-lends.index')
            ->with('success', 'ProductLend created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $productLend = ProductLend::find($id);

        return view('product-lend.show', compact('productLend'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $productLend = ProductLend::find($id);

        return view('product-lend.edit', compact('productLend'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductLendRequest $request, ProductLend $productLend): RedirectResponse
    {
        $productLend->update($request->validated());

        return Redirect::route('product-lends.index')
            ->with('success', 'ProductLend updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        ProductLend::find($id)->delete();

        return Redirect::route('product-lends.index')
            ->with('success', 'ProductLend deleted successfully');
    }
}
