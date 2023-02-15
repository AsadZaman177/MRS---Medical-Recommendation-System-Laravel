<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ShippingCharges;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    //Index
    public function index(){
        $shipping = ShippingCharges::find(1);
        return view('admin.shipping.index',compact('shipping'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $shipping = ShippingCharges::find($request->id);
        $shipping->name = $request->name;
        $shipping->price = $request->price;
        $shipping->save();

        return back()->with('message','Updated Successfully');
    }
}
