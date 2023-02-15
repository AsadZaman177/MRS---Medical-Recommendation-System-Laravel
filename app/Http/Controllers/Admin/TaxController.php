<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    //Index
    public function index(){
        $tax = Tax::find(1);
        return view('admin.tax.index',compact('tax'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $tax = Tax::find($request->id);
        $tax->name = $request->name;
        $tax->price = $request->price;
        $tax->save();

        return back()->with('message','Updated Successfully');
    }
}
