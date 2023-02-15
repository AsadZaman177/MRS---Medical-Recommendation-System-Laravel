<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MedicineType;
use Illuminate\Http\Request;

class MedicineTypeController extends Controller
{
    //Index Page
     public function index(){

        $types = MedicineType::all();
        return view('admin.medicine_type.index',compact('types'));
    }

    //Create page
    public function create(){
        return view('admin.medicine_type.create');
    }

    //save
    public function store(Request $request){
        $request->validate([
            'type' => 'required|unique:medicine_types',
        ]);

        $type = MedicineType::create([
            'type' => $request->type,
            ]);
        if($type){
            return redirect('medicines/type')->with('message','Created Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // edit
    public function edit($id){
        $type = MedicineType::find($id);
        return view('admin.medicine_type.edit',compact('type'));
    }

    public function update(Request $request){
        $request->validate([
            'type' => 'required|unique:medicine_types,type,'.$request->id,
        ]);

        $type = MedicineType::find($request->id);
        if($type){
            $type->type = $request->type;
            $type->save();
            return redirect('medicines/type')->with('message','Updated Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // Delete 
    public function delete($id){

        $type = MedicineType::find($id);
        if($type){
            $type->delete();
            return redirect('medicines/type')->with('message','Deleted Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }

    }

}
