<?php
namespace App\Http\Controllers;

use App\Models\SalesRecord;
use App\Models\Product;
use App\Models\Region;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSales = SalesRecord::sum('totalSales');
        $productsPerRegion = Region::withCount('salesRecords')->get();
        $salesPerMonth = SalesRecord::selectRaw('MONTH(`date-of-sale`) as month, SUM(`units-sold`) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('dashboard.index', compact('totalSales', 'productsPerRegion', 'salesPerMonth'));
    }
}