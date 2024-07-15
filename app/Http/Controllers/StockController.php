<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Enums\Operation;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\StockRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $stocks = Stock::paginate();

        return view('admin.stock.index', compact('stocks'))
            ->with('i', ($request->input('page', 1) - 1) * $stocks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $stock = new Stock();
        $enumOperations = Operation::cases();
        $products = Product::all();
   
        
        return view('admin.stock.create', [
            'stock' => $stock,
            'enumOperations' => $enumOperations,
            'products' => $products,
        ]);
    }

    public function createSell(): View
    {
       return $this->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StockRequest $request): RedirectResponse
    {
        //check if the product price wasen't change by user cause is readonly, mapped to product

        $data = $request->validated();
        $product = Product::findOrFail($data['product_id']);
        // user can't clearance product in stock if the product in stock not exist or letter than out value
        $currentStock = Stock::getCurrentStockByProductId($product->id);
        // dd($currentStock);
        if($data['quantity'] > $currentStock ){
            return redirect()->back()->with(['error' => 'Quantity must be less or equal to current stock']);
        }
        // dd($product, $product->quantity, $data['quantity']);
        if($data['operation'] == Operation::CLEARANCE->value){      
            $data['price'] = -abs($data['price']);
        }
        
        Stock::create($data);

        return Redirect::route('stocks.index')
            ->with('success', 'Stock created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $stock = Stock::find($id);


        return view('admin.stock.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $stock = Stock::find($id);
        $products = Product::all();
        $enumOperations = Operation::cases();
        


        return view('admin.stock.edit', compact('stock', 'products', 'enumOperations'));
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
