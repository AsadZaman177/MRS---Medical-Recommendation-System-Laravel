<?php

namespace App\Http\Controllers;

use App\CMS;
use App\Medicine;
use App\MedicineBrand;
use App\MedicineCategory;
use App\MedicineCompany;
use App\MedicineFormulae;
use App\News;
use App\Symptom;
use App\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index(Request $request)
    {
        $categories = MedicineCategory::with('medicines')->get();
        $catTab = isset($request->id) ? $request->id : $categories->first()->id;
        $medicine_onsale = Medicine::where('is_onsale','1')->get();
        $medicine_featured = Medicine::where('is_featured','1')->get(); 
        $cms = CMS::where('section_id','home')->first();
        $news = News::all();
        $testimonials = Testimonial::all();
        return view('home',compact('catTab','categories','medicine_onsale','medicine_featured','cms','testimonials','news'));
    }

    public function about(){

        $cms = CMS::where('section_id','about')->first();
        return view('about',compact('cms'));
    }

    public function search_medicine(){
        $cms = CMS::where('section_id','search-medicine')->first();
        return view('search-medicine',compact('cms'));

    }

    public function smart_doctor(){
        $cms = CMS::where('section_id','smart-doctor')->first();
        return view('smart-doctor',compact('cms'));
    }

    public function shop(){
        $medicines = Medicine::paginate(12);
        $cms = CMS::where('section_id','shop')->first();
        return view('shop',compact('medicines','cms'));
    }

    public function product_details($slug){
        $medicine = Medicine::where('slug',$slug)->first();
        $topMed = Medicine::where('is_onsale','1')->latest()->take(3)->get();
        $allMed = Medicine::all();

        return view('medicine-details',compact('medicine','topMed','allMed'));
    }

    public function terms_conditions(){
        $cms = CMS::where('section_id','terms-conditions')->first();
        return view('terms-conditions',compact('cms'));
    }

    public function privacy_policy(){
        $cms = CMS::where('section_id','privacy-policy')->first();
        return view('privacy-policy',compact('cms'));
    }

    public function contact(){
        $cms = CMS::where('section_id','contact')->first();
        return view('contact',compact('cms'));
    }

    public function news(){
        $new = News::paginate(9);
        return view('news',compact('new'));
    }

    public function news_single($slug){
        $news = News::where('slug',$slug)->first();
        return view('news-single',compact('news'));
    }
    
}
