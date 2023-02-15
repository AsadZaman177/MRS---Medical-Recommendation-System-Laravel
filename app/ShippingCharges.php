<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingCharges extends Model
{
    protected $fillable = ['name','price'];
}
