<?php

namespace App\Http\Controllers;

use App\Age;
use App\BodyPart;
use App\Checkout;
use App\CMS;
use App\Contact;
use App\Medicine;
use App\MedicineBrand;
use App\MedicineCategory;
use App\MedicineCompany;
use App\MedicineFormulae;
use App\News;
use App\Symptom;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // Home Page
    public function index(Request $request)
    {
        $categories = MedicineCategory::with('medicines')->get();
        $catTab = $request->id ?? ($categories->isNotEmpty() ? $categories->first()->id : null);
        $medicine_onsale = Medicine::where('is_onsale','1')->get();
        $medicine_featured = Medicine::where('is_featured','1')->get(); 
        $cms = CMS::where('section_id','home')->first();
        $news = News::all();
        $testimonials = Testimonial::all();
        return view('home',compact('catTab','categories','medicine_onsale','medicine_featured','cms','testimonials','news'));
    }

    // About Page
    public function about(){

        $cms = CMS::where('section_id','about')->first();
        return view('about',compact('cms'));
    }

    //Search Medicine Page
    public function search_medicine(){
        $cms = CMS::where('section_id','search-medicine')->first();
        return view('search-medicine',compact('cms'));
    }

    public function searchMedicine(Request $request){
        $request->validate([
            'search' => 'required',
        ]);

        $medicines = Medicine::whereHas('medicine_brand', function ($query) use ($request) {
            $query->where('brand', 'like', '%' . $request->search . '%');
        })
        ->orWhereHas('medicine_formulae', function ($query) use ($request) {
            $query->where('formulae', 'like', '%' . $request->search . '%');
        })
        ->orderBy(function($query) {
            $query->selectRaw('COALESCE(sale_price, price) as price')
                ->orderBy('price', 'asc');
        })
        ->paginate(12);

        return view('search-result',compact('medicines'));
    }

    //Smart Doctor Page
    public function smart_doctor(){
        $cms = CMS::where('section_id','smart-doctor')->first();
        $ages = Age::all();
        $body_parts = BodyPart::all();

        return view('smart-doctor',compact('cms','ages','body_parts'));
    }

    // Get Body Part related Symptoms
    public function getSymptoms($body_part_id){
        $symptoms = BodyPart::with('symptoms')->find($body_part_id);
        return $symptoms;
    }

    // Recomend Medicines search From smart doctor page
    public function recomend(Request $request){
        $request->validate([
            'age' => 'required',
            'gender' => 'required',
            'body_part' => 'required',
            'symptoms' => 'required'
        ]);

        $medicines = Medicine::query();

        if ($request->has('age')) {
            $medicines->where('age_id', $request->age);
        }
        
        if ($request->has('gender')) {
            $medicines->where('gender', $request->gender);
        }
        
        if ($request->has('body_part')) {
            $medicines->where('body_part_id', $request->body_part);
        }
        
        if ($request->has('symptoms')) {
            $medicines->whereHas('symptoms', function ($query) use ($request) {
                $query->whereIn('symptom_id', $request->symptoms);
            });
        }
        
        $medicines = $medicines->paginate(12);

        return view('smart-search',compact('medicines'));
    }

    // Shop Page
    public function shop(){
        $medicines = Medicine::paginate(12);
        $cms = CMS::where('section_id','shop')->first();
        return view('shop',compact('medicines','cms'));
    }

    // Medicne Detail page
    public function product_details($slug){
        $medicine = Medicine::where('slug',$slug)->first();
        $topMed = Medicine::where('is_onsale','1')->latest()->take(3)->get();
        $allMed = Medicine::all();

        return view('medicine-details',compact('medicine','topMed','allMed'));
    }

    // Terms and Condition Page
    public function terms_conditions(){
        $cms = CMS::where('section_id','terms-conditions')->first();
        return view('terms-conditions',compact('cms'));
    }

    // Privacy Policy Page
    public function privacy_policy(){
        $cms = CMS::where('section_id','privacy-policy')->first();
        return view('privacy-policy',compact('cms'));
    }

    // Contact Page
    public function contact(){
        $cms = CMS::where('section_id','contact')->first();
        return view('contact',compact('cms'));
    }

    // Store Contact
    public function postContact(Request $request){
        $request->validate([
            'name' =>'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        if($contact){
            return back()->with('success','Thank you for contacting us! we will get back to you soon');
        }
        else{
            return back()->with('error','Error!');
        }
    }

    // News Page
    public function news(){
        $new = News::paginate(9);
        return view('news',compact('new'));
    }

    // News Deatil Page
    public function news_single($slug){
        $news = News::where('slug',$slug)->first();
        return view('news-single',compact('news'));
    }

    // Order Tracking Page
    public function trackOrder(){
        return view('order-tracking');
    }

    public function posttrackOrder(Request $request){

        $track = Checkout::where('order_number', $request->order_number)->first();

        return view('order-tracking',compact('track'));
    }
    
}

