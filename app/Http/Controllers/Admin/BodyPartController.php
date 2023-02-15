<?php

namespace App\Http\Controllers\Admin;

use App\BodyPart;
use App\Http\Controllers\Controller;
use App\Symptom;
use Illuminate\Http\Request;

class BodyPartController extends Controller
{
    //Index Page
    public function index(){
        $body_parts = BodyPart::with('symptoms')->get();
        
        return view('admin.body_part.index',compact('body_parts'));
    }

    //Create page
    public function create(){
        $symptoms = Symptom::all();
        return view('admin.body_part.create',compact('symptoms'));
    }

    //save
    public function store(Request $request){
        $request->validate([
            'body_part' => 'required|unique:body_parts',
            'symptoms' => 'required',
        ]);

        $body_part = BodyPart::create([
            'body_part' => $request->body_part,
            ]);
        if($body_part){
            $body_part->symptoms()->attach($request->symptoms);
            return redirect('medicines/body_part')->with('message','Created Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // edit
    public function edit($id){
        $body_part = BodyPart::find($id);
        $symptoms = Symptom::all();
        return view('admin.body_part.edit',compact('body_part','symptoms'));
    }

    public function update(Request $request){
        $request->validate([
            'body_part' => 'required|unique:body_parts,body_part,'.$request->id,
            'symptoms' => 'required',
        ]);

        $body_part = BodyPart::find($request->id);
        
        if($body_part){
            $body_part->body_part = $request->body_part;
            $body_part->save();
            $body_part->symptoms()->sync($request->symptoms);
            return redirect('medicines/body_part')->with('message','Updated Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // Delete 
    public function delete($id){

        $body_part = BodyPart::find($id);
        if($body_part){
            $body_part->delete();
            return redirect('medicines/body_part')->with('message','Deleted Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }

    }
}
