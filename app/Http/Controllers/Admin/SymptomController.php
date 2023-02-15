<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Symptom;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    //Index Page
     public function index(){

        $symptoms = Symptom::all();
        return view('admin.symptom.index',compact('symptoms'));
    }

    //Index Create page
    public function create(){
        return view('admin.symptom.create');
    }

    //save
    public function store(Request $request){
        $request->validate([
            'symptom' => 'required|unique:symptoms',
        ]);

        $symptom = Symptom::create([
            'symptom' => $request->symptom,
            ]);
        if($symptom){
            return redirect('medicines/symptom')->with('message','Created Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // edit
    public function edit($id){
        $symptom = Symptom::find($id);
        return view('admin.symptom.edit',compact('symptom'));
    }

    public function update(Request $request){
        $request->validate([
            'symptom' => 'required|unique:symptoms,symptom,'.$request->id,
        ]);

        $symptom = Symptom::find($request->id);
        if($symptom){
            $symptom->symptom = $request->symptom;
            $symptom->save();
            return redirect('medicines/symptom')->with('message','Updated Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // Delete 
    public function delete($id){

        $symptom = Symptom::find($id);
        if($symptom){
            $symptom->delete();
            return redirect('medicines/symptom')->with('message','Deleted Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }

    }
}
