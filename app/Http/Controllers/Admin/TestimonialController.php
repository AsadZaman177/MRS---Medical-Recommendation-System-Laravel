<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    //Index Page 
    public function index(){
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index',compact('testimonials'));
    }

    //Create Page 
    public function create(){
        return view('admin.testimonial.create');
    }

    //Store  
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'comments' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,svg', 
        ]);

        $image = $this->uploadFile($request, 'image');
       
        $testimonial = Testimonial::create([ 
            'name' => $request->name,
            'company' => $request->company,
            'comments' => $request->comments,
            'image' => $image,
        ]);

        return redirect('/testimonial')->with('message','Created Successfully!');
    }

    // Upload File Function
    public function uploadFile($request, $inputName) {
        $uploadedImage = $request->file($inputName);
        $imageWithExt = $uploadedImage->getClientOriginalName($uploadedImage);
        $imageName = pathinfo($imageWithExt, PATHINFO_FILENAME);
        $imageExt = $uploadedImage->getClientOriginalExtension();
        $image = $imageName . time() . "." . $imageExt;
        $request->$inputName->move(public_path('images/'), $image);
        return $image;
    }

    //Edit Page 
    public function edit($id){
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit',compact('testimonial'));
    }

    //Update  
    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'comments' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,svg', 
        ]);
        
        $testimonial = Testimonial::findOrFail($request->id);

        $image = $testimonial->image;
        if($request->has('image')){
            $path = "images/";
            $old_image = $testimonial->image;
            $this->deleteImage($path,$old_image);
            $image = $this->uploadFile($request, 'image');
        }

        $testimonial->name = $request->name;
        $testimonial->company = $request->company;
        $testimonial->comments = $request->comments;
        $testimonial->image = $image;
        $testimonial->save();

        return redirect('/testimonial')->with('message','Updated Successfully!');
    }

    // Delete Image
    public function deleteImage($path,$image){
        if (!empty($image)) {
            $file_path = public_path().'/'.rtrim($path, '/').'/'.$image;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
    }

    // Delete 
    public function delete($id){
        $testimonial = Testimonial::find($id);
        if($testimonial){
            $path = "images/";
            $image = $testimonial->image;
            $this->deleteImage($path,$image);
            $testimonial->delete();
            return back()->with('message','Deleted Successfully!');
        }
        else{
            return back()->with('error','Something went wrong,try again!');
        }  

    }
}
