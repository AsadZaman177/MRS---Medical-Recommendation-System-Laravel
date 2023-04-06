<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['name','slug','sku','image1','image2','image3','age_id','gender','medicine_type_id',
    'medicine_formulae_id','medicine_brand_id','medicine_company_id','medicine_category_id','body_part_id',
    'is_featured','is_onsale','price','sale_price','stock','remaining_stock','description','created_by'];

    // user_id belongs to users
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    // medicine_type_id belongs to medicine_types
    public function medicine_type()
    {
        return $this->belongsTo('App\MedicineType', 'medicine_type_id');
    }

    // medicine_formulae belongs to medicine_formulaes
    public function medicine_formulae()
    {
        return $this->belongsTo('App\MedicineFormulae', 'medicine_formulae_id');
    }

    // medicine_brand belongs to medicine_brands
    public function medicine_brand()
    {
        return $this->belongsTo('App\MedicineBrand', 'medicine_brand_id');
    }

    // medicine_brand belongs to medicine_brands
    public function medicine_company()
    {
        return $this->belongsTo('App\MedicineCompany', 'medicine_company_id');
    }

    // medicine_category belongs to medicine category
    public function medicine_category()
    {
        return $this->belongsTo('App\MedicineCategory', 'medicine_category_id');
    }

    // body_part_id belongs to Body Part
    public function BodyPart()
    {
        return $this->belongsTo('App\BodyPart', 'body_part_id');
    }

    // age belongs to age
    public function age()
    {
        return $this->belongsTo('App\Age', 'age_id');
    }

    // sysmtops belongs to symptoms
    public function symptoms(){
        
        return $this->belongsToMany('App\Symptom');
    }

    //dosage belongs to dosage
    public function dosages(){
        
        return $this->belongsToMany('App\Dosage');
    }

    //medicine can have many checkouts
    public function checkoutDetails(){
        return $this->hasMany('App\CheckoutDetail');
    }

    //medicine can have many reviews
    public function reviews(){
        return $this->hasMany('App\MedicineReview');
    }
    

}
