<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MedicineCategory;
use Illuminate\Http\Request;

class MedicineCategoryController extends Controller
{
    //Index Page
    public function index(){

        $categories = MedicineCategory::all();
        return view('admin.medicine_category.index',compact('categories'));
    }

    //Index Create page
    public function create(){
        return view('admin.medicine_category.create');
    }

    //save
    public function store(Request $request){
        $request->validate([
            'category' => 'required|unique:medicine_categories',
        ]);

        $category = MedicineCategory::create([
            'category' => $request->category,
            ]);
        if($category){
            return redirect('medicines/category')->with('message','Created Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // edit
    public function edit($id){
        $category = MedicineCategory::find($id);
        return view('admin.medicine_category.edit',compact('category'));
    }

    public function update(Request $request){
        $request->validate([
            'category' => 'required|unique:medicine_categories,category,'.$request->id,
        ]);

        $category = MedicineCategory::find($request->id);
        if($category){
            $category->category = $request->category;
            $category->save();
            return redirect('medicines/category')->with('message','Updated Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // Delete 
    public function delete($id){

        $category = MedicineCategory::find($id);
        if($category){
            $category->delete();
            return redirect('medicines/category')->with('message','Deleted Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }

    }
}
