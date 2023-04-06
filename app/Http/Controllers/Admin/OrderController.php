<?php

namespace App\Http\Controllers\Admin;

use App\Checkout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //Index Page
    public function index(){
        $orders = Checkout::all()->sortByDesc('created_at');
        return view('admin.orders.index',compact('orders'));
    }

    // processing Orders
    public function processingOrders(){

        $orders = Checkout::where('status','processing')->get()->sortByDesc('created_at');

        return view('admin.orders.processing',compact('orders'));
    }

    // processing Orders
    public function deliveredOrders(){

        $orders = Checkout::where('status','delivered')->get()->sortByDesc('created_at');

        return view('admin.orders.delivered',compact('orders'));
    }

    // OnHold Orders
    public function onholdOrders(){

        $orders = Checkout::where('status','on hold')->get()->sortByDesc('created_at');

        return view('admin.orders.onhold',compact('orders'));
    }

    // Completed Orders
    public function completedOrders(){
 
        $orders = Checkout::where('status','completed')->get()->sortByDesc('created_at');

        return view('admin.orders.completed',compact('orders'));
    }

    //Edit Order
    public function edit($id){
        $order = Checkout::find($id);
        return view('admin.orders.edit',compact('order'));
    }

    // update Order
    public function update(Request $request){
        $order = Checkout::find($request->order_id);
        $order->status = $request->status;
        $order->payment_status = $request->payment_status;
        $order->save();
        if($order){
            return redirect('/orders')->with('message','Updated Successfully!');
        }
        else{
            return redirect('/orders')->with('error','Something Went Wrong!');
        }
    }

    // Delete Order
    public function delete($id){
        $order = Checkout::find($id);
        if($order){
            $order->delete();
            return redirect('/orders')->with('message','Deleted Successfully!');
        }
        else{
            return redirect('/orders')->with('error','Something Went Wrong!');
        }
    }
}
