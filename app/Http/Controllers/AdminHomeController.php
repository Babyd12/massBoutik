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
        $salesSum = $sales->sum('price');
        $period = 'Daily';
        $products = Product::with('stocks')->get();
        $totalProfit = Product::getTotalProfit($products);
        
        

        return view('admin.home', [
            // compact('sales', 'salesCount', 'salesSum', 'period', 'products')
            'sales' => $sales,
            'salesCount' => $salesCount,
            'salesSum' => $salesSum,
            'period' => $period,
            'products' => $products,
            'totalProfit' => $totalProfit,
        ]);
    }

    public function recentSalesPerPeriod(Request $request): View
    {
        $period = $request->period;
        $sales = $recentSales = Stock::getStockByOperation('clearance', $period);
        $salesCount = $sales->count();
        $salesSum = $sales->sum('price');
        return view('admin.home', compact('sales', 'salesCount', 'salesSum', 'period'));
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
