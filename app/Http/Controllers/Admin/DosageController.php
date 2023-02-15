<?php

namespace App\Http\Controllers\Admin;

use App\Dosage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosageController extends Controller
{
    //Index Page
    public function index(){

        $dosages = Dosage::all();
        return view('admin.medicine_dosage.index',compact('dosages'));
    }

    //Create page
    public function create(){
        return view('admin.medicine_dosage.create');
    }

    //save
    public function store(Request $request){
        $request->validate([
            'dosage' => 'required|unique:dosages',
        ]);

        $dosage = Dosage::create([
            'dosage' => $request->dosage,
            ]);
        if($dosage){
            return redirect('medicines/dosage')->with('message','Created Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // edit
    public function edit($id){
        $dosage = Dosage::find($id);
        return view('admin.medicine_dosage.edit',compact('dosage'));
    }

    public function update(Request $request){
        $request->validate([
            'dosage' => 'required|unique:dosages,dosage,'.$request->id,
        ]);

        $dosage = Dosage::find($request->id);
        if($dosage){
            $dosage->dosage = $request->dosage;
            $dosage->save();
            return redirect('medicines/dosage')->with('message','Updated Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // Delete 
    public function delete($id){

        $dosage = Dosage::find($id);
        if($dosage){
            $dosage->delete();
            return redirect('medicines/dosage')->with('message','Deleted Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }

    }
}
