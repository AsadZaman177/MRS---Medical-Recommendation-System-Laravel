<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = ['order_number','user_id','total','status','payment_method','payment_status','notes'];

    // user_id belongs to user
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    // checkout hasMany checkoutdetails
    public function checkoutDetails(){
        return $this->hasMany('App\CheckoutDetail');
    }
}
