<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['name','sku','image1','image2','image3','age_id','gender','medicine_type_id',
    'medicine_formulae_id','medicine_brand_id','medicine_company_id','medicine_category_id','body_part_id',
    'is_featured','is_onsale','price','sale_price','stock','description','created_by'];

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function medicine_type()
    {
        return $this->belongsTo('App\MedicineType', 'medicine_type_id');
    }

    public function medicine_formulae()
    {
        return $this->belongsTo('App\MedicineFormulae', 'medicine_formulae_id');
    }

    public function medicine_brand()
    {
        return $this->belongsTo('App\MedicineBrand', 'medicine_brand_id');
    }

    public function medicine_company()
    {
        return $this->belongsTo('App\MedicineCompany', 'medicine_company_id');
    }

    public function medicine_category()
    {
        return $this->belongsTo('App\MedicineCategory', 'medicine_category_id');
    }

    public function BodyPart()
    {
        return $this->belongsTo('App\BodyPart', 'body_part_id');
    }

    public function age()
    {
        return $this->belongsTo('App\Age', 'age_id');
    }

    public function symptoms(){
        
        return $this->belongsToMany('App\Symptom');
    }

    public function dosages(){
        
        return $this->belongsToMany('App\Dosage');
    }
    

}
