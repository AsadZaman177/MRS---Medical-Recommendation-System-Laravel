<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicineReview extends Model
{
    protected $fillable = ['medicine_id','rating','comment','name','email'];

    // medicine_id belongs to Medicines
    public function medicine(){
       return $this->belongsTo('App\Medicine','medicine_id');
    }
 
}
