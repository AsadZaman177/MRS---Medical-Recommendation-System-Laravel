<?php

namespace App\Http\Controllers\Admin;

use App\Checkout;
use App\CheckoutDetail;
use App\Http\Controllers\Controller;
use App\Medicine;
use App\MedicineReview;
use App\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //Sales Report
    public function index(){
       
        $sales = Checkout::leftJoin('users', 'users.id', '=', 'checkouts.user_id')
        ->select('users.name','order_number', 'total', 'payment_method', 'payment_status','checkouts.updated_at')
        ->where('status', '=', 'completed')
        ->get();
        
        $overallTotal = $sales->sum('total');

        return view('admin.reports.sales-report', compact('sales','overallTotal'));
    }

    // Product Sales Report
    public function productSalesReport(){
        $product_sales = CheckoutDetail::selectRaw('medicine_name, SUM(quantity) as total_quantity_sold, SUM(sub_total) as total_revenue')
                     ->groupBy('medicine_name')
                     ->get();
        $overallTotal = $product_sales->sum('total_revenue');
        return view('admin.reports.products-sales-report', compact('product_sales','overallTotal'));
    }

    // product stock repor
    public function productStockReport(){
        $products = Medicine::all();
        return view('admin.reports.stock-report', compact('products'));
    }

    // Payments Report
    public function PaymentsReport(){

        $paymentMethods = Checkout::distinct('payment_method')->pluck('payment_method');

        $payments = [];
        $paymentDetails = [];

        foreach ($paymentMethods as $paymentMethod) {
            $payments[$paymentMethod] = Checkout::where('payment_method', $paymentMethod)->sum('total');
            $paymentDetails[$paymentMethod] = Checkout::where('payment_method', $paymentMethod)->get();
        }

        return view('admin.reports.payments-report', [
            'payments' => $payments,
            'paymentDetails' => $paymentDetails,
            'paymentMethods' => $paymentMethods,
        ]);
        
    }

    // Review Report
    public function ReviewsReport(){

        $medicineReviews = MedicineReview::selectRaw('medicine_id, count(*) as total_reviews, avg(rating) as avg_rating')
        ->groupBy('medicine_id')
        ->get();

        return view('admin.reports.reviews-report', compact('medicineReviews'));
    }
}
