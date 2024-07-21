<?php

namespace App\Http\Controllers;

use App\Enums\CodeDevise;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $sales = Stock::getStockByOperation('clearance');
        $salesCount = $sales->count();
        $salesSum = $sales->sum('price');
        $period = 'Daily';
        $products = Product::with('unitPerPack')->get();
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

    public function recentSalesPerPeriod(Request $request)
    {
        $period = $request->period;
        $sales = $recentSales = Stock::getStockByOperation('clearance', $period);
        $salesCount = $sales->count();
        $salesSum = $sales->sum('price');
        return view('admin.home', compact('sales', 'salesCount', 'salesSum', 'period'));
    }
}
