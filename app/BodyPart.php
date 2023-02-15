<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BodyPart extends Model
{
    protected $fillable = ['body_part'];

    // Body Parts have many Symptoms
    public function symptoms(){
        
        return $this->belongsToMany('App\Symptom');
    }
}
