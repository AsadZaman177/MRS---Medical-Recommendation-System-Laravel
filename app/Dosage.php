<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosage extends Model
{
   protected $fillable = ['dosage']; 

   public function ages(){

     return $this->belongsToMany('App\Age');

   }
    public function medicines(){

      return $this->belongsToMany('App\Medicine');
      
    }

}
