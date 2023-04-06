<?php

use App\Http\Controllers\Admin\TypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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
// Search Medicine
Route::post('/search-med','HomeController@searchMedicine');
Route::get('/smart-doctor','HomeController@smart_doctor');
// get BodyPart related Symptoms
Route::get('/symptoms/{body_part_id}', 'HomeController@getSymptoms');
Route::post('/recomend','HomeController@recomend');
Route::get('/shop','HomeController@shop');
Route::get('/shop/{slug}','HomeController@product_details');
Route::get('/news','HomeController@news');
Route::get('/news/{slug}','HomeController@news_single');
Route::get('/contact-us','HomeController@contact');
Route::post('store/contact','HomeController@postContact');
Route::get('/terms-and-conditions','HomeController@terms_conditions');
Route::get('/privacy-policy','HomeController@privacy_policy');

// Cart Routes
Route::get('/cart', 'CartController@index');
Route::get('add-to-cart/{id}', 'CartController@addToCart');
Route::patch('update-cart', 'CartController@update');
Route::delete('remove-from-cart', 'CartController@remove');

// Checkout Routes
Route::get('/checkout', 'CheckoutController@index');
Route::post('store/checkout', 'CheckoutController@store');

Route::get('track-order','HomeController@trackOrder');
Route::post('track-order-result','HomeController@posttrackOrder');

// Reviews
Route::post('review/store', 'MedicineReviewController@store');

// Backend Routes
Route::group(['middleware' => 'auth'], function(){ 
    
    // User Routes
    Route::get('user/dashboard', 'User\UserController@index');
    Route::get('user/profile', 'User\UserController@profile');
    Route::post('user/profile/update', 'User\UserController@updateProfile');
    Route::get('user/orders', 'User\UserController@orders');
    Route::get('user/orders/view/{id}', 'User\UserController@viewOrder');
    Route::get('user/orders/processing', 'User\UserController@processingOrders');
    Route::get('user/orders/delivered', 'User\UserController@deliveredOrders');
    Route::get('user/orders/onhold', 'User\UserController@onholdOrders');
    Route::get('user/orders/completed', 'User\UserController@completedOrders');

        
    //Admin Routes
    Route::group(['middleware' => 'is_admin'], function(){ 

        //Admin Dashboad 
        Route::get('/dashboard', 'Admin\DashboardController@index');

        // User Routes
        Route::prefix('users')->name('users.')->group(function () { 
            Route::get('/', 'Admin\UserController@index');
            Route::get('/create', 'Admin\UserController@create');
            Route::post('/store', 'Admin\UserController@store');
            Route::get('/edit/{id}', 'Admin\UserController@edit');
            Route::post('/update', 'Admin\UserController@update');
            Route::get('/delete/{id}', 'Admin\UserController@delete');
        });

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

        // Order Routes
        Route::prefix('orders')->name('orders.')->group(function () { 
            Route::get('/', 'Admin\OrderController@index');
            Route::get('/edit/{id}', 'Admin\OrderController@edit');
            Route::post('/update', 'Admin\OrderController@update');
            Route::get('/delete/{id}', 'Admin\OrderController@delete');
            Route::get('/processing', 'Admin\OrderController@processingOrders');
            Route::get('/delivered', 'Admin\OrderController@deliveredOrders');
            Route::get('/onhold', 'Admin\OrderController@onholdOrders');
            Route::get('/completed', 'Admin\OrderController@completedOrders');
        });

        // Medicine Reviews
        Route::prefix('reviews')->name('reviews.')->group(function () { 
            Route::get('/', 'MedicineReviewController@index');
            Route::get('/delete/{id}', 'MedicineReviewController@delete');
        });

        // Contact 
        Route::prefix('contact')->name('contact.')->group(function () { 
            Route::get('/', 'Admin\ContactController@index');
            Route::get('/delete/{id}', 'Admin\ContactController@delete');
        });

        // Reports
        Route::prefix('reports')->name('reports.')->group(function () { 
            Route::get('/sales-report', 'Admin\ReportController@index');
            Route::get('/products-sales-report', 'Admin\ReportController@productSalesReport');
            Route::get('/products-stock-report', 'Admin\ReportController@productStockReport');
            Route::get('/payments-report', 'Admin\ReportController@PaymentsReport');
            Route::get('/reviews-report', 'Admin\ReportController@ReviewsReport');
        });
        


    });

});

