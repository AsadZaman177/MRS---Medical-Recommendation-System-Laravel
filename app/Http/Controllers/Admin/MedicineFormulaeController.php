<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MedicineFormulae;
use Illuminate\Http\Request;

class MedicineFormulaeController extends Controller
{
    //Index Page
    public function index(){

        $formulaes = MedicineFormulae::all();
        return view('admin.medicine_formulae.index',compact('formulaes'));
    }

    //Index Create page
    public function create(){
        return view('admin.medicine_formulae.create');
    }

    //save
    public function store(Request $request){
        $request->validate([
            'formulae' => 'required|unique:medicine_formulaes',
        ]);

        $formulae = MedicineFormulae::create([
            'formulae' => $request->formulae,
            ]);
        if($formulae){
            return redirect('medicines/formulae')->with('message','Created Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // edit
    public function edit($id){
        $formulae = MedicineFormulae::find($id);
        return view('admin.medicine_formulae.edit',compact('formulae'));
    }

    public function update(Request $request){
        $request->validate([
            'formulae' => 'required|unique:medicine_formulaes,formulae,'.$request->id,
        ]);

        $formulae = MedicineFormulae::find($request->id);
        if($formulae){
            $formulae->formulae = $request->formulae;
            $formulae->save();
            return redirect('medicines/formulae')->with('message','Updated Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // Delete 
    public function delete($id){

        $formulae = MedicineFormulae::find($id);
        if($formulae){
            $formulae->delete();
            return redirect('medicines/formulae')->with('message','Deleted Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }

    }

}
