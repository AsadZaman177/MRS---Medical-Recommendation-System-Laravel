<?php

namespace App\Http\Controllers\Admin;

use App\CMS;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CMSController extends Controller
{
    // Gebral Setting Page
    public function index(){
        $cms = CMS::where('section_id','genral')->first();
        return view('admin.cms.genral-settings',compact('cms'));
    }

    // Store Genral Settings
    public function store_genral(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'facebook' => 'required|url',
            'instagram' => 'required|url',
            'twitter' => 'required|url',
            'youtube' => 'required|url',
            'footer_about' => 'required',
            'cta_text' => 'required',
            'cta_btn_text' => 'required',
            'copyright' => 'required',
        ]);

        $genral_seetings = CMS::findOrFail($request->id);
        

        
        $logo = $genral_seetings->logo;
        if($request->has('logo')){
            $path = "images/";
            $old_logo = $genral_seetings->logo;
            $this->deleteImage($path,$old_logo);
            $logo = $this->uploadFile($request, 'logo');
        }

        $footer_certificate = $genral_seetings->footer_certificate;
        if($request->has('footer_certificate')){
            $path = "images";
            $old_certificate = $genral_seetings->footer_certificate;
            $this->deleteImage($path,$old_certificate);
            $footer_certificate = $this->uploadFile($request, 'footer_certificate');
        }

        $footer_payment = $genral_seetings->footer_payment;
        if($request->has('footer_payment')){
            $path = "images";
            $old_payment = $genral_seetings->footer_payment;
            $this->deleteImage($path,$old_payment);
            $footer_payment = $this->uploadFile($request, 'footer_payment');
        }

        $genral_seetings->name = $request->name;
        $genral_seetings->email = $request->email;
        $genral_seetings->address = $request->address;
        $genral_seetings->facebook = $request->facebook;
        $genral_seetings->instagram = $request->instagram;
        $genral_seetings->twitter = $request->twitter;
        $genral_seetings->youtube = $request->youtube;
        $genral_seetings->footer_about = $request->footer_about;
        $genral_seetings->cta_text = $request->cta_text;
        $genral_seetings->cta_btn_text = $request->cta_btn_text;
        $genral_seetings->copyright = $request->copyright;
        $genral_seetings->logo = $logo;
        $genral_seetings->footer_certificate = $footer_certificate;
        $genral_seetings->footer_payment = $footer_payment;
        $genral_seetings->save();

        return back()->with('message','Updated Successfully!');

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

    // Delete Image
    public function deleteImage($path,$image){
        if (!empty($image)) {
            $file_path = public_path().'/'.rtrim($path, '/').'/'.$image;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
    }

    // Home Page Form
    public function homepage(){
        $cms = CMS::where('section_id','home')->first();
        return view('admin.cms.home-page',compact('cms'));
    }

    public function store_homepage(Request $request){
        $request->validate([
            'page_title' => 'required',
            'page_desc' => 'required',
            'search_widget_img' => 'mimes:jpg,jpeg,png,svg',
            'search_widget_title' => 'required',
            'search_widget_desc' => 'required',
            'buy_widget_img' => 'mimes:jpg,jpeg,png,svg',
            'buy_widget_title' => 'required',
            'buy_widget_desc' => 'required',
            'diagnose_img' => 'mimes:jpg,jpeg,png,svg',
            'diagnose_title' => 'required',
            'diagnose_desc' => 'required',
            'free_ship_icon' => 'mimes:jpg,jpeg,png,svg',
            'free_ship_title' => 'required',
            'free_ship_desc' => 'required',
            'return_icon' => 'mimes:jpg,jpeg,png,svg',
            'return_title' => 'required',
            'return_desc' => 'required',
            'secure_icon' => 'mimes:jpg,jpeg,png,svg',
            'secure_title' => 'required',
            'secure_desc' => 'required',
            'gifts_icon' => 'mimes:jpg,jpeg,png,svg',
            'gifts_title' => 'required',
            'gifts_desc' => 'required',
            'our_products_title' => 'required',
            'our_products_desc' => 'required',
            'sale_products_title' => 'required',
            'sale_products_desc' => 'required',
            'featured_products_title' => 'required',
            'featured_products_desc' => 'required',
            'countdown_subheading' => 'required',
            'countdown_heading' => 'required',
            'countdown_desc' => 'required',
            'countdown_img' => 'mimes:jpg,jpeg,png,svg',
            'countdown_date' => 'required',
        ]);

        $home = CMS::findOrFail($request->id);

        $search_widget_img = $home->search_widget_img;
        if($request->has('search_widget_img')){
            $path = "images/";
            $old_search_widget_img = $home->search_widget_img;
            $this->deleteImage($path,$old_search_widget_img);
            $search_widget_img = $this->uploadFile($request, 'search_widget_img');
        }

        $buy_widget_img = $home->buy_widget_img;
        if($request->has('buy_widget_img')){
            $path = "images/";
            $old_buy_widget_img = $home->buy_widget_img;
            $this->deleteImage($path,$old_buy_widget_img);
            $buy_widget_img = $this->uploadFile($request, 'buy_widget_img');
        }

        $diagnose_img = $home->diagnose_img;
        if($request->has('diagnose_img')){
            $path = "images/";
            $old_diagnose_img = $home->diagnose_img;
            $this->deleteImage($path,$old_diagnose_img);
            $diagnose_img = $this->uploadFile($request, 'diagnose_img');
        }

        $free_ship_icon = $home->free_ship_icon;
        if($request->has('free_ship_icon')){
            $path = "images/";
            $old_free_ship_icon = $home->free_ship_icon;
            $this->deleteImage($path,$old_free_ship_icon);
            $free_ship_icon = $this->uploadFile($request, 'free_ship_icon');
        }

        $return_icon = $home->return_icon;
        if($request->has('return_icon')){
            $path = "images/";
            $old_return_icon = $home->return_icon;
            $this->deleteImage($path,$old_return_icon);
            $return_icon = $this->uploadFile($request, 'return_icon');
        }

        $secure_icon = $home->secure_icon;
        if($request->has('secure_icon')){
            $path = "images/";
            $old_secure_icon = $home->secure_icon;
            $this->deleteImage($path,$old_secure_icon);
            $secure_icon = $this->uploadFile($request, 'secure_icon');
        }

        $gifts_icon = $home->gifts_icon;
        if($request->has('gifts_icon')){
            $path = "images/";
            $old_gifts_icon = $home->gifts_icon;
            $this->deleteImage($path,$old_gifts_icon);
            $gifts_icon = $this->uploadFile($request, 'gifts_icon');
        }

        $countdown_img = $home->countdown_img;
        if($request->has('countdown_img')){
            $path = "images/";
            $old_countdown_img = $home->countdown_img;
            $this->deleteImage($path,$old_countdown_img);
            $countdown_img = $this->uploadFile($request, 'countdown_img');
        }

        $home->page_title = $request->page_title;
        $home->page_desc = $request->page_desc;
        $home->search_widget_img = $search_widget_img;
        $home->search_widget_title = $request->search_widget_title;
        $home->search_widget_desc = $request->search_widget_desc;
        $home->buy_widget_img = $buy_widget_img;
        $home->buy_widget_title = $request->buy_widget_title;
        $home->buy_widget_desc = $request->buy_widget_desc;
        $home->diagnose_img = $diagnose_img;
        $home->diagnose_title = $request->diagnose_title;
        $home->diagnose_desc = $request->diagnose_desc;
        $home->free_ship_icon = $free_ship_icon;
        $home->free_ship_title = $request->free_ship_title;
        $home->free_ship_desc = $request->free_ship_desc;
        $home->return_icon = $return_icon;
        $home->return_title = $request->return_title;
        $home->return_desc = $request->return_desc;
        $home->secure_icon = $secure_icon;
        $home->secure_title = $request->secure_title;
        $home->secure_desc = $request->secure_desc;
        $home->gifts_icon = $gifts_icon;
        $home->gifts_title = $request->gifts_title;
        $home->gifts_desc = $request->gifts_desc;
        $home->our_products_title = $request->our_products_title;
        $home->our_products_desc = $request->our_products_desc;
        $home->sale_products_title = $request->sale_products_title;
        $home->sale_products_desc = $request->sale_products_desc;
        $home->featured_products_title = $request->featured_products_title;
        $home->featured_products_desc = $request->featured_products_desc;
        $home->countdown_subheading = $request->countdown_subheading;
        $home->countdown_heading = $request->countdown_heading;
        $home->countdown_desc = $request->countdown_desc;
        $home->countdown_img = $countdown_img;
        $home->countdown_date= $request->countdown_date;
        $home->save();

        return back()->with('message','Updated Successfully!');
               
    }

    // About Page
    public function aboutpage(){
        $cms = CMS::where('section_id','about')->first();
        return view('admin.cms.about-page',compact('cms'));
    }

    //Store About Page
    public function store_aboutpage(Request $request){
        $request->validate([
            'page_title' => 'required',
            'page_desc' => 'required',
            'page_bg_img' => 'mimes:jpg,jpeg,png,svg', 
        ]);

        $about = CMS::findOrFail($request->id);

        $page_bg_img = $about->page_bg_img;
        if($request->has('page_bg_img')){
            $path = "images/";
            $old_page_bg_img = $about->page_bg_img;
            $this->deleteImage($path,$old_page_bg_img);
            $page_bg_img = $this->uploadFile($request, 'page_bg_img');
        }

        $about->page_title = $request->page_title;
        $about->page_desc = $request->page_desc;
        $about->page_bg_img = $page_bg_img;
        $about->save();

        return back()->with('message','Updated Successfully!');
    }

    // Shop Page
    public function shoppage(){
        $cms = CMS::where('section_id','shop')->first();
        return view('admin.cms.shop-page',compact('cms'));
    }

    //Store Shop Page
    public function store_shoppage(Request $request){
        
        $request->validate([
            'page_title' => 'required',
            'page_desc' => 'required',
            'page_bg_img' => 'mimes:jpg,jpeg,png,svg', 
        ]);

        $shop = CMS::findOrFail($request->id);

        $page_bg_img = $shop->page_bg_img;
        if($request->has('page_bg_img')){
            $path = "images/";
            $old_page_bg_img = $shop->page_bg_img;
            $this->deleteImage($path,$old_page_bg_img);
            $page_bg_img = $this->uploadFile($request, 'page_bg_img');
        }

        $shop->page_title = $request->page_title;
        $shop->page_desc = $request->page_desc;
        $shop->page_bg_img = $page_bg_img;
        $shop->save();

        return back()->with('message','Updated Successfully!');
    }

    // Smart Doctor
    public function smartdoctor(){
        $cms = CMS::where('section_id','smart-doctor')->first();
        return view('admin.cms.smart-doctor',compact('cms'));
    }

    //Store Smart Doctor Page
    public function store_smartdoctor(Request $request){
        
        $request->validate([
            'page_title' => 'required',
            'page_desc' => 'required',
            'page_bg_img' => 'mimes:jpg,jpeg,png,svg', 
        ]);

        $smartdoctor = CMS::findOrFail($request->id);

        $page_bg_img = $smartdoctor->page_bg_img;
        if($request->has('page_bg_img')){
            $path = "images/";
            $old_page_bg_img = $smartdoctor->page_bg_img;
            $this->deleteImage($path,$old_page_bg_img);
            $page_bg_img = $this->uploadFile($request, 'page_bg_img');
        }

        $smartdoctor->page_title = $request->page_title;
        $smartdoctor->page_desc = $request->page_desc;
        $smartdoctor->page_bg_img = $page_bg_img;
        $smartdoctor->save();

        return back()->with('message','Updated Successfully!');
    }

    // Search Medicine Page
    public function searchmedicinepage(){
        $cms = CMS::where('section_id','search-medicine')->first();
        return view('admin.cms.search-medicine-page',compact('cms'));
    }

    //Store Search Medicine Page
    public function store_searchmedicinepage(Request $request){
        
        $request->validate([
            'page_title' => 'required',
            'page_desc' => 'required',
            'page_bg_img' => 'mimes:jpg,jpeg,png,svg', 
        ]);

        $searchmedicine = CMS::findOrFail($request->id);

        $page_bg_img = $searchmedicine->page_bg_img;
        if($request->has('page_bg_img')){
            $path = "images/";
            $old_page_bg_img = $searchmedicine->page_bg_img;
            $this->deleteImage($path,$old_page_bg_img);
            $page_bg_img = $this->uploadFile($request, 'page_bg_img');
        }

        $searchmedicine->page_title = $request->page_title;
        $searchmedicine->page_desc = $request->page_desc;
        $searchmedicine->page_bg_img = $page_bg_img;
        $searchmedicine->save();

        return back()->with('message','Updated Successfully!');
    }

    // Contact Page
    public function contactpage(){
        $cms = CMS::where('section_id','contact')->first();
        return view('admin.cms.contact-page',compact('cms'));
    }

    //Store Contact Page
    public function store_contactpage(Request $request){
        
        $request->validate([
            'page_title' => 'required',
            'page_desc' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'page_bg_img' => 'mimes:jpg,jpeg,png,svg', 
        ]);

        $contactpage = CMS::findOrFail($request->id);

        $page_bg_img = $contactpage->page_bg_img;
        if($request->has('page_bg_img')){
            $path = "images/";
            $old_page_bg_img = $contactpage->page_bg_img;
            $this->deleteImage($path,$old_page_bg_img);
            $page_bg_img = $this->uploadFile($request, 'page_bg_img');
        }

        $contactpage->page_title = $request->page_title;
        $contactpage->page_desc = $request->page_desc;
        $contactpage->email = $request->email;
        $contactpage->phone = $request->phone;
        $contactpage->address = $request->address;
        $contactpage->page_bg_img = $page_bg_img;
        $contactpage->save();

        return back()->with('message','Updated Successfully!');
    }

    // Terms & Condition Page
    public function termsandconditions(){
        $cms = CMS::where('section_id','terms-conditions')->first();
        return view('admin.cms.terms-conditions-page',compact('cms'));
    }

    //Store Term & Condtions Page
    public function store_termsandconditions(Request $request){
        
        $request->validate([
            'page_title' => 'required',
            'page_desc' => 'required',
            'page_bg_img' => 'mimes:jpg,jpeg,png,svg', 
        ]);

        $termsandconditions = CMS::findOrFail($request->id);

        $page_bg_img = $termsandconditions->page_bg_img;
        if($request->has('page_bg_img')){
            $path = "images/";
            $old_page_bg_img = $termsandconditions->page_bg_img;
            $this->deleteImage($path,$old_page_bg_img);
            $page_bg_img = $this->uploadFile($request, 'page_bg_img');
        }

        $termsandconditions->page_title = $request->page_title;
        $termsandconditions->page_desc = $request->page_desc;
        $termsandconditions->page_bg_img = $page_bg_img;
        $termsandconditions->save();

        return back()->with('message','Updated Successfully!');
    }

     // Privacy Policy Page
     public function privacypolicy(){
        $cms = CMS::where('section_id','privacy-policy')->first();
        return view('admin.cms.privacy-policy-page',compact('cms'));
    }

    //Store Privacy Policy Page
    public function store_privacypolicy(Request $request){
        
        $request->validate([
            'page_title' => 'required',
            'page_desc' => 'required',
            'page_bg_img' => 'mimes:jpg,jpeg,png,svg', 
        ]);

        $privacypolicy = CMS::findOrFail($request->id);

        $page_bg_img = $privacypolicy->page_bg_img;
        if($request->has('page_bg_img')){
            $path = "images/";
            $old_page_bg_img = $privacypolicy->page_bg_img;
            $this->deleteImage($path,$old_page_bg_img);
            $page_bg_img = $this->uploadFile($request, 'page_bg_img');
        }

        $privacypolicy->page_title = $request->page_title;
        $privacypolicy->page_desc = $request->page_desc;
        $privacypolicy->page_bg_img = $page_bg_img;
        $privacypolicy->save();

        return back()->with('message','Updated Successfully!');
    }


    
}
