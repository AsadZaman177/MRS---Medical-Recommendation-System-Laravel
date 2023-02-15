<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    protected $fillable = ['age'];

    public function dosages(){
       return $this->belongsToMany('App\Dosage');
    }
    
}
