<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    // Index Page
    public function index(){
        $coupons = Coupon::all();
        return view('admin.coupons.index',compact('coupons'));
    }

    // create page
    public function create(){
        
        return view('admin.coupons.create');
    }

    // Store
    public function store(Request $request){
        $request->validate([
            'code' => 'required|unique:coupons,code',
            'price' => 'required',
            'expiry_date' => 'required',
        ]);

        $coupon = Coupon::create([
            'code' => $request->code,
            'price' => $request->price,
            'expiry_date' => $request->expiry_date,
        ]);

        if($coupon){
            return redirect('/coupon')->with('message','Created Successfully!');
        }
        else{
            return redirect('/coupon')->with('error','Something Went Wrong!');
        }
    }

    // Edit
    public function edit($id){
        $coupon = Coupon::find($id);
        return view('admin.coupons.edit',compact('coupon'));
    }

    // Update
    public function update(Request $request){
        $request->validate([
            'code' => 'required|unique:coupons,code,'.$request->id,
            'price' => 'required',
            'expiry_date' => 'required',
        ]);

        $coupon = Coupon::find($request->id);
        $coupon->code = $request->code;
        $coupon->price = $request->price;
        $coupon->expiry_date = $request->expiry_date;
        $coupon->save();
        if($coupon){
            return redirect('/coupon')->with('message','Updated Successfully!');
        }
        else{
            return redirect('/coupon')->with('error','Something Went Wrong!');
        }
    }

    // Delete
    public function delete($id){
        $coupon = Coupon::find($id);
        if($coupon){
            $coupon->delete();
            return redirect('/coupon')->with('message','Deleted Successfully!');
        }
        else{
            return redirect('/coupon')->with('error','Something Went Wrong!');
        }
    }
}
