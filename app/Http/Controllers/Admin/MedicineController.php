<?php

namespace App\Http\Controllers\Admin;

use App\Age;
use App\BodyPart;
use App\Dosage;
use App\Http\Controllers\Controller;
use App\Medicine;
use App\MedicineBrand;
use App\MedicineCategory;
use App\MedicineCompany;
use App\MedicineFormulae;
use App\MedicineType;
use App\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MedicineController extends Controller
{
    //Index Page
    public function index(){
        $medicines = Medicine::all();
        // dd($medicines);
        return view('admin.medicine.index',compact('medicines'));
    }

    //Create page
    public function create(){
        $medicine_types = MedicineType::all();
        $ages = Age::all();
        $body_parts = BodyPart::all();
        $medicine_formulaes = MedicineFormulae::all();
        $medicine_categories = MedicineCategory::all();
        $medicine_companies = MedicineCompany::all();
        $medicine_brands = MedicineBrand::all();
        
        return view('admin.medicine.create',compact('medicine_types','ages','body_parts','medicine_formulaes','medicine_categories','medicine_companies','medicine_brands'));
    }

    // Get Age related Dosage for dropdown
    public function getDosage($age_id){
        $dosage = Age::with('dosages')->find($age_id);
        return $dosage;
    }

    // Get Body Part related Symptoms
    public function getSymptoms($body_part_id){
        $symptoms = BodyPart::with('symptoms')->find($body_part_id);
        return $symptoms;
    }

    // Store
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'sku' => 'unique:medicines',
            'gender' => 'required',
            'stock' => 'required',
            'medicine_type' => 'required',
            'age' => 'required',
            'dosage' => 'required',
            'body_part' => 'required',
            'symptoms' => 'required',
            'medicine_formulae' => 'required',
            'medicine_category' => 'required',
            'medicine_company' => 'required',
            'medicine_brand' => 'required',
            'image1' => 'required|mimes:jpg,jpeg,png,bmp,gif',
            'image2' => 'mimes:jpg,jpeg,png,bmp,gif',
            'image3' => 'mimes:jpg,jpeg,png,bmp,gif',
            'price' => 'required',
        ]);

        $user = Auth::user();
        $is_featured = $request->is_featured == 'on' ? '1' : '0';
        $is_onsale = $request->is_onsale == 'on' ? '1' : '0';
        
        if($request->sku){
            $sku = $request->sku;
        }else{
            $sku = random_int(00001, 10000);
        }
        
        $image1 = $this->uploadFile($request, 'image1');
        if($request->image2){
            $image2 = $this->uploadFile($request, 'image2');
        }
        if($request->image3){
            $image3 = $this->uploadFile($request, 'image3');
        }

        $name = MedicineBrand::find($request->medicine_brand);

        $medicine = Medicine::create([ 
            'name' => $name->brand,
            'slug' => Str::slug($name->brand),
            'sku' => $sku,
            'gender' => $request->gender,
            'medicine_type_id' => $request->medicine_type,
            'age_id' => $request->age,
            'body_part_id' => $request->body_part,
            'medicine_formulae_id' => $request->medicine_formulae,
            'medicine_company_id' => $request->medicine_company,
            'medicine_brand_id' => $request->medicine_brand,
            'medicine_category_id' => $request->medicine_category,
            'image1' => $image1,
            'image2' => $image2 ?? null,
            'image3' => $image3 ?? null,
            'is_featured' => $is_featured,
            'is_onsale' => $is_onsale,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'stock' => $request->stock,
            'description' => $request->description,
            'created_by' => $user->id,

            ]);
            if($medicine){
           
                $medicine->dosages()->attach($request->dosage);
                $medicine->symptoms()->attach($request->symptoms);
                
            }

            return redirect('/medicines')->with('message','Created Successfully!');
    }

    // Upload File Function
    public function uploadFile($request, $inputName) {
        $uploadedImage = $request->file($inputName);
        $imageWithExt = $uploadedImage->getClientOriginalName($uploadedImage);
        $imageName = pathinfo($imageWithExt, PATHINFO_FILENAME);
        $imageExt = $uploadedImage->getClientOriginalExtension();
        $image = $imageName . time() . "." . $imageExt;
        $request->$inputName->move(public_path('images/medicines'), $image);
        return $image;
    }

    // Edit
    public function edit($id){
        $medicine = Medicine::find($id);
        $medicine_types = MedicineType::all();
        $ages = Age::all();
        $body_parts = BodyPart::all();
        $medicine_formulaes = MedicineFormulae::all();
        $medicine_categories = MedicineCategory::all();
        $medicine_companies = MedicineCompany::all();
        $medicine_brands = MedicineBrand::all();
        return view('admin.medicine.edit',compact('medicine','medicine_types','ages','body_parts','medicine_formulaes','medicine_categories','medicine_companies','medicine_brands'));
    }

    public function update(Request $request){
       
        $request->validate([
            'sku' => 'unique:medicines,sku,'.$request->id,
            'gender' => 'required',
            'stock' => 'required',
            'medicine_type' => 'required',
            'age' => 'required',
            'dosage' => 'required',
            'body_part' => 'required',
            'symptoms' => 'required',
            'medicine_formulae' => 'required',
            'medicine_category' => 'required',
            'medicine_company' => 'required',
            'medicine_brand' => 'required',
            'image1' => 'mimes:jpg,jpeg,png,bmp,gif',
            'image2' => 'mimes:jpg,jpeg,png,bmp,gif',
            'image3' => 'mimes:jpg,jpeg,png,bmp,gif',
            'price' => 'required',
        ]);

        $user = Auth::user();
        $is_featured = $request->is_featured == 'on' ? '1' : '0';
        $is_onsale = $request->is_onsale == 'on' ? '1' : '0';

        $medicine = Medicine::findOrFail($request->id);

        $image1 = $medicine->image1;
        if($request->has('image1')){
            $path = "images/medicines";
            $image = $medicine->image1;
            $this->deleteImage($path,$image);
            $image1 = $this->uploadFile($request, 'image1');
        }

        $image2 = $medicine->image2;
        if($request->has('image2')){
            $path = "images/medicines";
            $image = $medicine->image2;
            $this->deleteImage($path,$image);
            $image2 = $this->uploadFile($request, 'image2');
        }
        $image3 = $medicine->image3;
        if($request->has('image3')){
            $path = "images/medicines";
            $image = $medicine->image3;
            $this->deleteImage($path,$image);
            $image3 = $this->uploadFile($request, 'image3');
        }

        $name = MedicineBrand::find($request->medicine_brand);
        
        $medicine->name = $name->brand;
        $medicine->slug = Str::slug($name->brand);
        $medicine->sku = $request->sku;
        $medicine->gender = $request->gender;
        $medicine->medicine_type_id = $request->medicine_type;
        $medicine->age_id = $request->age;
        $medicine->body_part_id = $request->body_part;
        $medicine->medicine_formulae_id = $request->medicine_formulae;
        $medicine->medicine_company_id =$request->medicine_company;
        $medicine->medicine_brand_id = $request->medicine_brand;
        $medicine->medicine_category_id = $request->medicine_category;
        $medicine->image1 = $image1;
        $medicine->image2 = $image2;
        $medicine->image3 = $image3;
        $medicine->is_featured = $is_featured;
        $medicine->is_onsale = $is_onsale;
        $medicine->price= $request->price;
        $medicine->sale_price = $request->sale_price;
        $medicine->stock = $request->stock;
        $medicine->description = $request->description;
        $medicine->created_by = $user->id;
        $medicine->save();
        if($medicine){
           
            $medicine->dosages()->sync($request->dosage);
            $medicine->symptoms()->sync($request->symptoms);
            
        }
        return redirect('/medicines')->with('message','Updated Successfully!');

    }

    // Delete Image
    public function deleteImage($path,$image){
        $file_path = public_path() . '/' . $path . '/' . $image;
            if(file_exists($file_path)){
                unlink($file_path);
            }
    }

    // Delete 
    public function delete($id){
        $medicine = Medicine::find($id);
        if($medicine){
            $path = "images/medicines";
            $image1 = $medicine->image1;
            $image2 = $medicine->image2;
            $image3 = $medicine->image3;
            $this->deleteImage($path,$image1);
            $this->deleteImage($path,$image2);
            $this->deleteImage($path,$image3);
            $medicine->delete();
            return back()->with('message','Deleted Successfully!');
        }
        else{
            return back()->with('error','Something went wrong,try again!');
        }  

    }

}
