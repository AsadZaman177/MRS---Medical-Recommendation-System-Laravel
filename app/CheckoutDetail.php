<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckoutDetail extends Model
{
    protected $fillable = ['checkout_id','medicine_id','medicine_name','price','quantity','sub_total'];


    // checkout_id belongs to checkout
    public function checkout(){
       return  $this->belongsTo('App\Checkout','checkout_id');
    }

    // medicine_id belongs to Medicine
    public function medicine(){
       return $this->belongsTo('App\Medicine','medicine_id');
    }
    
}
