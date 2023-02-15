<?php

namespace App\Http\Controllers\Admin;

use App\Age;
use App\Dosage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgeController extends Controller
{
    //Index Page
    public function index(){
        $ages = Age::with('dosages')->get();
        
        return view('admin.age.index',compact('ages'));
    }

    //Create page
    public function create(){
        $dosages = Dosage::all();
        return view('admin.age.create',compact('dosages'));
    }

    //save
    public function store(Request $request){
        
        $request->validate([
            'age' => 'required|unique:ages',
            'dosages' => 'required',
        ]);

        $age = Age::create([
            'age' => $request->age,
            ]);
        if($age){
            $age->dosages()->attach($request->dosages);
            return redirect('medicines/age')->with('message','Created Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // edit
    public function edit($id){
        $age = Age::find($id);
        $dosages = Dosage::all();
        return view('admin.age.edit',compact('age','dosages'));
    }

    public function update(Request $request){
        $request->validate([
            'age' => 'required|unique:ages,age,'.$request->id,
            'dosages' => 'required',
        ]);

        $age = Age::find($request->id);
        
        if($age){
            $age->age = $request->age;
            $age->save();
            $age->dosages()->sync($request->dosages);
            return redirect('medicines/age')->with('message','Updated Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // Delete 
    public function delete($id){

        $age = Age::find($id);
        if($age){
            $age->delete();
            return redirect('medicines/age')->with('message','Deleted Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }

    }
}
