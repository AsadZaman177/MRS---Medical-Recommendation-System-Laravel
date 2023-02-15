<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable =['title','slug','featured_image','content','created_by'];

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
