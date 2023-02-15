<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MedicineCompany;
use Illuminate\Http\Request;

class MedicineCompanyController extends Controller
{
    //Index Page
    public function index(){

        $companies = MedicineCompany::all();
        return view('admin.medicine_company.index',compact('companies'));
    }

    //Index Create page
    public function create(){
        return view('admin.medicine_company.create');
    }

    //save
    public function store(Request $request){
        $request->validate([
            'company' => 'required|unique:medicine_companies',
        ]);

        $company = MedicineCompany::create([
            'company' => $request->company,
            ]);
        if($company){
            return redirect('medicines/company')->with('message','Created Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // edit
    public function edit($id){
        $company = MedicineCompany::find($id);
        return view('admin.medicine_company.edit',compact('company'));
    }

    public function update(Request $request){
        $request->validate([
            'company' => 'required|unique:medicine_companies,company,'.$request->id,
        ]);

        $company = MedicineCompany::find($request->id);
        if($company){
            $company->company = $request->company;
            $company->save();
            return redirect('medicines/company')->with('message','Updated Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }
    }

    // Delete 
    public function delete($id){

        $company = MedicineCompany::find($id);
        if($company){
            $company->delete();
            return redirect('medicines/company')->with('message','Deleted Successfully!');
        }
        else {
            return redirect()->back()->with('error','Something Went Wrong.Try Again!');
        }

    }

}
