<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\UnitPerPack;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $products = Product::with('unitPerPack')->paginate(10);

        return view('admin.product.index', compact('products'))
            ->with('i', ($request->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): RedirectResponse | View
    {
        $product = new Product();
        $unitPerPack = UnitPerPack::all();
        
        if($unitPerPack->isEmpty()){
            return Redirect::route('unit-per-packs.create')
                ->with('warning', 'The purchase unit is empty, Please add one before add product.');
        }

        return view('admin.product.create', compact('product', 'unitPerPack'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        // dd($request->validated());
        Product::create($request->validated());


        return Redirect::route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $product = Product::find($id);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $product = Product::find($id);
        $unitPerPack = UnitPerPack::all();
        
        if($unitPerPack->isEmpty()){
            return Redirect::route('unit-per-packs.create')
                ->with('warning', 'The purchase unit is empty, Please add one before add product.');
        }

        return view('admin.product.edit', compact('product', 'unitPerPack'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        return Redirect::route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Product::find($id)->delete();

        return Redirect::route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
