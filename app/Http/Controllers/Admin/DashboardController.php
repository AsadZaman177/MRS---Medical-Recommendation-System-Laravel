<?php

namespace App\Http\Controllers\Admin;

use App\Checkout;
use App\CheckoutDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //index page
    public function index()
    {
        $total_orders = Checkout::all()->count();
        $processing = Checkout::where('status','processing')->count(); 
        $delivered = Checkout::where('status','delivered')->count(); 
        $onhold = Checkout::where('status','on hold')->count(); 
        $completed = Checkout::where('status','completed')->count();

        $today_sales = Checkout::whereDate('created_at', DB::raw('CURDATE()'))->count();

        $monthly_sales = Checkout::whereYear('created_at', '=', date('Y'))
                          ->whereMonth('created_at', '=', date('m'))
                          ->count();
        
        // Get most salable product
        $mostSalable = CheckoutDetail::select('medicine_name', DB::raw('COUNT(*) as total_sales'))
                ->groupBy('medicine_name')
                ->orderByDesc('total_sales')
                ->first();
       
        
        return view('admin.dashboard',compact('total_orders','processing','delivered','onhold','completed','today_sales','monthly_sales','mostSalable'));
    }
}
