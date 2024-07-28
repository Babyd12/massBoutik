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
        
        DB::BeginTransaction();
        try{
            $product = Product::findOrFail($data['product_id']);

            $lend = Lend::create([
                'quantity' => $data['quantity'],
                'state' => $data['state'],
                'advance' => $data['advance'],
            ]);
            
            ProductLend::create([
                'user_id' => $data['user_id'],
                'product_id' => $data['product_id'],
                'lend_id' => $lend->id,
            ]);


            if($data['operation'] == Operation::CLEARANCE->value){   

                $currentStock = Stock::getCurrentStockByProductId($product->id);
                if($data['quantity'] > $currentStock ){
                    return redirect()->back()->with(['error' => 'Quantity must be less or equal to current stock']);
                }   
                $data['quantity'] = -abs($data['quantity']);
    
                if($data['operation_type'] == 'bulk'){
                    $data['price'] = $product->wholesale_price;
                } else{
                    $data['price'] = $product->selling_price;
                }
            }
            // dd($data);
            // Stock::create([
            //     // 'quantity', 'operation', 'operation_type', 'price', 'product_id'
            //     'quantity' => $data['quantity'],
            //     'operation' => $data['operation'],
            //     'operation_type' => $data['operation_type'],
            //     'price' => $data['price'],
            //     'product_id' => $product->id,
            // ]);
         
            DB::commit();
            return Redirect::route('lends.index')
            ->with('success', 'Lend created successfully.');

        } catch(\Exception $e){
            DB::rollBack();
           
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
        // dd($request->validated());
        $lend->update($request->validated());

        return Redirect::route('lends.index')
            ->with('success', 'Lend updated successfully');
    }

    public function destroy($id): RedirectResponse
    {   
        ProductLend::findOrFail($id)->delete();

        return Redirect::route('lends.index')
            ->with('success', 'Lend deleted successfully');
    }
}
