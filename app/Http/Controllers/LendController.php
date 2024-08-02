<?php

namespace App\Http\Controllers;

use App\Models\Lend;
use App\Models\User;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Service;
use App\Enums\Operation;
use Illuminate\View\View;
use App\Models\ProductLend;
use Illuminate\Http\Request;
use App\Http\Requests\LendRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Support\Facades\Http;

class LendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productLends = ProductLend::with('user', 'product', 'lend')->paginate(10);
        // foreach($productLends as $prod){
        //     dd($prod->lend);
        // }
        return view('admin.lend.index', compact('productLends'))
            ->with('i', ($request->input('page', 1) - 1) * $productLends->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.lend.create', [
            'lend' => new Lend(),
            'products' => Product::all(),
            'users' => User::all(),
            'services' => Service::all(),
            'enumOperations' => Operation::cases(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LendRequest $request): RedirectResponse
    {
        $data = $request->validated();
        // dd($data);
        DB::BeginTransaction();
        try {
            $product =  Product::findOrFail($data['product_id']);

            $currentStock = Stock::getCurrentStockByProductId($product->id);
            if ($data['quantity'] > $currentStock) {
                return redirect()->back()->with(['error' => 'Quantity must be less or equal to current stock']);
            }
            $lend  = lend::create($data);
            // dd($lend);
            ProductLend::create([
                'user_id' => $data['user_id'],
                'product_id' => $data['product_id'],
                'lend_id' => $lend->id,
            ]);

            DB::commit();
            return Redirect::route('lends.index')
                ->with('success', 'Lend created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->route('lends.create')
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $lend = Lend::find($id);

        return view('admin.lend.show', compact('lend'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $lend = Lend::with('productLends.user', 'productLends.product')->findOrFail($id);

        return view('admin.lend.edit', [
            'lend' => $lend,
            'products' => Product::all(),
            'users' => User::all(),
            'services' => Service::all(),
            'enumOperations' => Operation::cases(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LendRequest $request, Lend $lend): RedirectResponse
    {
        // add here logique for add in stock if state is paid 

        $data = $request->validated();
        // dd($lend->id);
        $product = Product::findOrFail($data['product_id']);


        $currentStock = Stock::getCurrentStockByProductId($product->id);
        if ($data['quantity'] > $currentStock) {
            return redirect()->back()->with(['error' => 'Quantity must be less or equal to current stock']);
        }
        $data['quantity'] = -abs($data['quantity']);

        if ($data['operation_type'] == 'bulk') {
            $data['price'] = $product->wholesale_price;
        } else {
            $data['price'] = $product->selling_price;
        }

        if ($request->payment_status == '1') { // 1 is paid
            DB::BeginTransaction();

            try {
                Stock::create([
                    'quantity' => $data['quantity'],
                    'operation' => 'clearance',
                    'operation_type' => $data['operation_type'],
                    'price' => $data['price'],
                    'lend_id' => $lend->id,
                    'product_id' => $product->id,
                ]);
                $lend->update($request->validated());

                DB::commit();
                return Redirect::route('lends.index')
                    ->with('success', 'Lend updated successfully');
            } catch (\Exception $e) {

                DB::rollBack();
                return Redirect::route('lends.edit', $lend->id)
                    ->with('error', $e->getMessage());
            }
            
        } else if ($request->payment_status == '0') {
            DB::beginTransaction();
            try {
                $stock = Stock::where('lend_id', $lend->id)->first();
                if ($stock) {
                    $stock->delete();
                }
                $lend->update($request->validated());
                DB::commit();
                return Redirect::route('lends.index')
                    ->with('success', 'Lend updated successfully');
            } catch (\Exception $e) {

                return Redirect::route('lends.edit', $lend->id)
                ->with('success', $e->getMessage());
            }
        }
    }

    public function updateState(ProductLend $productLend)
    {
        $lend = Lend::find($productLend->lend_id);
        $product = Product::find($productLend->product_id);
        // dd($product);

        // by default state is false so  = 0
        if ($lend->payment_status == '0') { // is paid and sate is false i will change to true 
            DB::BeginTransaction();

            $lend->payment_status = true;
            $lend->save();

            try {
                Stock::create([
                    'quantity' => -abs($lend->quantity),
                    'operation' => 'clearance',
                    'operation_type' => $lend->operation_type,
                    'price' => $lend->operation_type == 'bulk' ? $product->wholesale_price : $product->selling_price,
                    'lend_id' => $productLend->lend_id,
                    'product_id' => $productLend->product_id,
                ]);
            
                DB::commit();
                return Redirect::route('lends.index')
                    ->with('success', 'Lend updated successfully');
            } catch (\Exception $e) {

                DB::rollBack();
                return Redirect::route('lends.edit', $lend->id)
                    ->with('error', $e->getMessage());
            }
            
        } else if ($lend->payment_status == '1') { 
            DB::beginTransaction();

          

            try {
                $stock = Stock::where('lend_id', $lend->id)->first();
                if ($stock) {
                    $stock->delete();
                }

                $lend->payment_status = false;
                $lend->save();

                DB::commit();

                return Redirect::route('lends.index')
                    ->with('success', 'Lend updated successfully');
            } catch (\Exception $e) {

                return Redirect::route('lends.edit', $lend->id)
                ->with('success', $e->getMessage());
            }
        }
        
        return redirect()->route('lends.index')
            ->with('success', 'Error 007');
    }


    public function destroy($id): RedirectResponse
    {
        ProductLend::findOrFail($id)->delete();

        return Redirect::route('lends.index')
            ->with('success', 'Lend deleted successfully');
    }
}
