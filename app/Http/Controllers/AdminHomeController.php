<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use App\Models\Product;
use App\Enums\CodeDevise;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AdminProfilRequest;

class AdminHomeController extends Controller
{
    public function index(): View
    {
        $sales = Stock::getStockByOperation('clearance');
        $salesCount = $sales->count();
        $salesSum = 0;
        foreach ($sales as $sale) {
            if ($sale->operation_type == 'bulk') {
                $salesSum += $sale->product->wholesale_price - $sale->product->purchace_price;
            } else {
                $salesSum += $sale->price;
            }
        }
        $period = 'Daily';
        $products = Product::with('unitPerPack')->get();
        $totalProfit = Product::getTotalProfit($products); // total profil by unit sell 
        $totalCost = Product::getNetProfit($products);
        

        return view('admin.home', [
            'sales' => $sales,
            'salesCount' => $salesCount,
            'salesSum' => $salesSum,
            'period' => $period,
            'products' => $products,
            'totalProfit' => $totalProfit,
            'totalCost' => $totalCost,
        ]);
    }

    public function recentSalesPerPeriod(Request $request): View
    {
        $period = $request->period;
        $sales = Stock::getStockByOperation('clearance', $period);
        $salesCount = $sales->count();
        $salesSum = 0;
        foreach ($sales as $sale) {
            if ($sale->operation_type == 'bulk') {
                $salesSum += $sale->product->wholesale_price - $sale->product->purchace_price;
            } else {
                $salesSum += $sale->price;
            }
        }
     
        $products = Product::with('unitPerPack')->get();
        $totalProfit = Product::getTotalProfit($products);
        $totalCost = Product::getNetProfit($products);


        return view('admin.home', [
            'period' => $period,
            'sales' => $sales,
            'salesCount' => $salesCount,
            'salesSum' => $salesSum,
            'period' => $period,
            'products' => $products,
            'totalProfit' => $totalProfit,
            'totalCost' => $totalCost,
        ]);
    }

    public function profile(): View
    {
        $user = auth()->user();
        $user->phones;
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(AdminProfilRequest $request, User $user): RedirectResponse
    {


        if ($request->hasFile('picture')) {
            $a = $request->file('picture')->store('images/users', 'public');
        }
        $user->update($request->validated());

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully.');
    }
}
