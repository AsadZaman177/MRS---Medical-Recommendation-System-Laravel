<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
   protected $fillable = ['symptom'];

   // Symptomss have many Body Parts
   public function body_parts(){

      return $this->belongsToMany('App\BodyPart');

   }

   // Symptomss have many Medicines
   public function medicines(){

      return $this->belongsToMany('App\Medicine');
      
   }

}


