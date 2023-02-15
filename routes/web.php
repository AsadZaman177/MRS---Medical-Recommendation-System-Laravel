<?php

use App\Http\Controllers\Admin\TypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Frontend Routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about');
Route::get('/search-medcine','HomeController@search_medicine');
Route::get('/smart-doctor','HomeController@smart_doctor');
Route::get('/shop','HomeController@shop');
Route::get('/shop/{slug}','HomeController@product_details');
Route::get('/news','HomeController@news');
Route::get('/news/{slug}','HomeController@news_single');
Route::get('/contact','HomeController@contact');
Route::get('/terms-and-conditions','HomeController@terms_conditions');
Route::get('/privacy-policy','HomeController@privacy_policy');

// Backend Routes
Route::group(['middleware' => 'auth'], function(){ 
    
    // User Routes
    Route::get('user/dashboard', 'User\UserController@index');
        
    //Admin Routes
    Route::group(['middleware' => 'is_admin'], function(){ 

        //Admin Dashboad 
        Route::get('/dashboard', 'Admin\DashboardController@index');

        //CMS Routes
        Route::prefix('cms')->name('cms.')->group(function () { 
            Route::get('/genral-settings', 'Admin\CMSController@index');
            Route::post('/store-genral', 'Admin\CMSController@store_genral');
            Route::get('/home-page', 'Admin\CMSController@homepage');
            Route::post('/store-homepage', 'Admin\CMSController@store_homepage');
            Route::get('/about-page', 'Admin\CMSController@aboutpage');
            Route::post('/store-aboutpage', 'Admin\CMSController@store_aboutpage');
            Route::get('/shop-page', 'Admin\CMSController@shoppage');
            Route::post('/store-shoppage', 'Admin\CMSController@store_shoppage');
            Route::get('/smart-doctor', 'Admin\CMSController@smartdoctor');
            Route::post('/store-smartdoctor', 'Admin\CMSController@store_smartdoctor');
            Route::get('/search-medicine-page', 'Admin\CMSController@searchmedicinepage');
            Route::post('/store-search-medicine-page', 'Admin\CMSController@store_searchmedicinepage');
            Route::get('/contact-page', 'Admin\CMSController@contactpage');
            Route::post('/store-contact-page', 'Admin\CMSController@store_contactpage');
            Route::get('/terms-conditions', 'Admin\CMSController@termsandconditions');
            Route::post('/store-terms-conditions', 'Admin\CMSController@store_termsandconditions');
            Route::get('/privacy-policy', 'Admin\CMSController@privacypolicy');
            Route::post('/store-privacy-policy', 'Admin\CMSController@store_privacypolicy');
        });

        // News Routes
        Route::prefix('newss')->name('newss.')->group(function () { 
            Route::get('/', 'Admin\NewsController@index');
            Route::get('/create', 'Admin\NewsController@create');
            Route::post('/store', 'Admin\NewsController@store');
            Route::get('/edit/{id}', 'Admin\NewsController@edit');
            Route::post('/update', 'Admin\NewsController@update');
            Route::get('/delete/{id}', 'Admin\NewsController@delete');
        });

        // News Routes
        Route::prefix('testimonial')->name('testimonial.')->group(function () { 
            Route::get('/', 'Admin\TestimonialController@index');
            Route::get('/create', 'Admin\TestimonialController@create');
            Route::post('/store', 'Admin\TestimonialController@store');
            Route::get('/edit/{id}', 'Admin\TestimonialController@edit');
            Route::post('/update', 'Admin\TestimonialController@update');
            Route::get('/delete/{id}', 'Admin\TestimonialController@delete');
        });

        // Coupon Code 
        Route::prefix('coupon')->name('coupon.')->group(function () { 
            Route::get('/', 'Admin\CouponController@index');
            Route::get('/create', 'Admin\CouponController@create');
            Route::post('/store', 'Admin\CouponController@store');
            Route::get('/edit/{id}', 'Admin\CouponController@edit');
            Route::post('/update', 'Admin\CouponController@update');
            Route::get('/delete/{id}', 'Admin\CouponController@delete');
        });

        //Tax Route
        Route::prefix('tax')->name('tax.')->group(function () { 
            Route::get('/', 'Admin\TaxController@index');
            Route::post('/store', 'Admin\TaxController@store');
        });

        //Shipping Charges Route
        Route::prefix('shipping')->name('shipping.')->group(function () { 
            Route::get('/', 'Admin\ShippingController@index');
            Route::post('/store', 'Admin\ShippingController@store');
        });


        // Medicine Routes
        Route::prefix('medicines')->name('medicines.')->group(function () {

            // Medicine Type Routes
            Route::prefix('type')->group(function () {
                Route::get('/', 'Admin\MedicineTypeController@index');
                Route::get('/create', 'Admin\MedicineTypeController@create');
                Route::post('/store', 'Admin\MedicineTypeController@store');
                Route::get('/edit/{id}', 'Admin\MedicineTypeController@edit');
                Route::post('/update', 'Admin\MedicineTypeController@update');
                Route::get('/delete/{id}', 'Admin\MedicineTypeController@delete');
            });

            // Medicine Formulae Routes
            Route::prefix('formulae')->group(function () {
                Route::get('/', 'Admin\MedicineFormulaeController@index');
                Route::get('/create', 'Admin\MedicineFormulaeController@create');
                Route::post('/store', 'Admin\MedicineFormulaeController@store');
                Route::get('/edit/{id}', 'Admin\MedicineFormulaeController@edit');
                Route::post('/update', 'Admin\MedicineFormulaeController@update');
                Route::get('/delete/{id}', 'Admin\MedicineFormulaeController@delete');
            });

            // Medicine Brand Routes
            Route::prefix('brand')->group(function () {
                Route::get('/', 'Admin\MedicineBrandController@index');
                Route::get('/create', 'Admin\MedicineBrandController@create');
                Route::post('/store', 'Admin\MedicineBrandController@store');
                Route::get('/edit/{id}', 'Admin\MedicineBrandController@edit');
                Route::post('/update', 'Admin\MedicineBrandController@update');
                Route::get('/delete/{id}', 'Admin\MedicineBrandController@delete');
            });

            // Medicine Company Routes
            Route::prefix('company')->group(function () {
                Route::get('/', 'Admin\MedicineCompanyController@index');
                Route::get('/create', 'Admin\MedicineCompanyController@create');
                Route::post('/store', 'Admin\MedicineCompanyController@store');
                Route::get('/edit/{id}', 'Admin\MedicineCompanyController@edit');
                Route::post('/update', 'Admin\MedicineCompanyController@update');
                Route::get('/delete/{id}', 'Admin\MedicineCompanyController@delete');
            });

            // Medicine Category Routes
            Route::prefix('category')->group(function () {
                Route::get('/', 'Admin\MedicineCategoryController@index');
                Route::get('/create', 'Admin\MedicineCategoryController@create');
                Route::post('/store', 'Admin\MedicineCategoryController@store');
                Route::get('/edit/{id}', 'Admin\MedicineCategoryController@edit');
                Route::post('/update', 'Admin\MedicineCategoryController@update');
                Route::get('/delete/{id}', 'Admin\MedicineCategoryController@delete');
            });

            // Medicine Symptoms Routes
            Route::prefix('symptom')->group(function () {
                Route::get('/', 'Admin\SymptomController@index');
                Route::get('/create', 'Admin\SymptomController@create');
                Route::post('/store', 'Admin\SymptomController@store');
                Route::get('/edit/{id}', 'Admin\SymptomController@edit');
                Route::post('/update', 'Admin\SymptomController@update');
                Route::get('/delete/{id}', 'Admin\SymptomController@delete');
            });

            // Medicine Body Parts Routes
            Route::prefix('body_part')->group(function () {
                Route::get('/', 'Admin\BodyPartController@index');
                Route::get('/create', 'Admin\BodyPartController@create');
                Route::post('/store', 'Admin\BodyPartController@store');
                Route::get('/edit/{id}', 'Admin\BodyPartController@edit');
                Route::post('/update', 'Admin\BodyPartController@update');
                Route::get('/delete/{id}', 'Admin\BodyPartController@delete');
            });

            // Medicine Dosage Routes
            Route::prefix('dosage')->group(function () {
                Route::get('/', 'Admin\DosageController@index');
                Route::get('/create', 'Admin\DosageController@create');
                Route::post('/store', 'Admin\DosageController@store');
                Route::get('/edit/{id}', 'Admin\DosageController@edit');
                Route::post('/update', 'Admin\DosageController@update');
                Route::get('/delete/{id}', 'Admin\DosageController@delete');
            });

            // Medicine Age Routes
            Route::prefix('age')->group(function () {
                Route::get('/', 'Admin\AgeController@index');
                Route::get('/create', 'Admin\AgeController@create');
                Route::post('/store', 'Admin\AgeController@store');
                Route::get('/edit/{id}', 'Admin\AgeController@edit');
                Route::post('/update', 'Admin\AgeController@update');
                Route::get('/delete/{id}', 'Admin\AgeController@delete');
            });

            // Medicines Routes
            Route::get('/', 'Admin\MedicineController@index');
            Route::get('/create', 'Admin\MedicineController@create');
            Route::post('/store', 'Admin\MedicineController@store');
            Route::get('/edit/{id}', 'Admin\MedicineController@edit');
            Route::post('/update', 'Admin\MedicineController@update');
            Route::get('/delete/{id}', 'Admin\MedicineController@delete');
            // get Age related dosage
            Route::get('/getDosage/{age_id}', 'Admin\MedicineController@getDosage');
            // get BodyPart related Symptoms
            Route::get('/getSymptoms/{body_part_id}', 'Admin\MedicineController@getSymptoms');
        });


    });

});

