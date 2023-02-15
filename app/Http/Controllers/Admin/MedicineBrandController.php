<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MedicineBrand;
use Illuminate\Http\Request;

class MedicineBrandController extends Controller
{
    //Index Page
    public function index(){

        $brands = MedicineBrand::all();
        return view('admin.medicine_brand.index',compact('brands'));
    }

    //Index Create page
    public function create(){
        return view('admin.medicine_brand.create');
    }

    //save
    public function store(Request $request){
        $request->validate([
            'brand' => 'required|unique:medicine_brands',
        ]);

        $brand = MedicineBrand::create([
            'brand' => $request->brand,
            ]);
        if($brand){
            return redirect('medicines/brand')->with('message','Created Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // edit
    public function edit($id){
        $brand = MedicineBrand::find($id);
        return view('admin.medicine_brand.edit',compact('brand'));
    }

    public function update(Request $request){
        $request->validate([
            'brand' => 'required|unique:medicine_brands,brand,'.$request->id,
        ]);

        $brand = MedicineBrand::find($request->id);
        if($brand){
            $brand->brand = $request->brand;
            $brand->save();
            return redirect('medicines/brand')->with('message','Updated Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // Delete 
    public function delete($id){

        $brand = MedicineBrand::find($id);
        if($brand){
            $brand->delete();
            return redirect('medicines/brand')->with('message','Deleted Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }

    }
}
