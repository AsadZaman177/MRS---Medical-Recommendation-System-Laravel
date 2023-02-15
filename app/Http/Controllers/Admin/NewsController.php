<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Illuminate\support\Str;

class NewsController extends Controller
{
    //Index Page 
    public function index(){
        $news = News::all();
        return view('admin.news.index',compact('news'));
    }

    //Create Page 
    public function create(){
        return view('admin.news.create');
    }

    //Store Newws 
    public function store(Request $request){
        $request->validate([
            'title' => 'required|unique:news',
            'content' => 'required',
            'featured_image' => 'required|mimes:jpg,jpeg,png,svg', 
        ]);

        $featured_image = $this->uploadFile($request, 'featured_image');
        $user = Auth::user();
        $news = News::create([ 
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'featured_image' => $featured_image,
            'created_by' => $user->id,
        ]);

        return redirect('/newss')->with('message','Created Successfully!');
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
        $news = News::find($id);
        return view('admin.news.edit',compact('news'));
    }

    //Update News 
    public function update(Request $request){
        $request->validate([
            'title' => 'required|unique:news,'.$request->id,
            'content' => 'required',
            'featured_image' => 'required|mimes:jpg,jpeg,png,svg', 
        ]);
        
        $news = News::findOrFail($request->id);
        $user = Auth::user();
        $featured_image = $news->featured_image;
        if($request->has('featured_image')){
            $path = "images/";
            $old_featured_image = $news->featured_image;
            $this->deleteImage($path,$old_featured_image);
            $featured_image = $this->uploadFile($request, 'featured_image');
        }

        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->content = $request->content;
        $news->featured_image = $featured_image;
        $news->created_by = $user->id;
        $news->save();

        return redirect('/newss')->with('message','Updated Successfully!');
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
        $news = News::find($id);
        if($news){
            $path = "images/";
            $featured_image = $news->featured_image;
            $this->deleteImage($path,$featured_image);
            $news->delete();
            return back()->with('message','Deleted Successfully!');
        }
        else{
            return back()->with('error','Something went wrong,try again!');
        }  

    }
}
