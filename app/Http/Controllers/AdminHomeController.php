<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $sales = $recentSales = Stock::getStockByOperation('clearance');
        $salesCount = $sales->count();
        $salesSum = $sales->sum('price');
        $period = 'Daily';
        return view('admin.home', compact('sales', 'salesCount', 'salesSum', 'period') );
    }

    public function recentSalesPerPeriod(Request $request)
    {
        $period = $request->period;
        $sales = $recentSales = Stock::getStockByOperation('clearance', $period);
        $salesCount = $sales->count();
        $salesSum = $sales->sum('price');
        return view('admin.home', compact('sales', 'salesCount', 'salesSum', 'period') );

    }
}
