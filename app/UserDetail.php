<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable =['user_id','phone','country','state','city','zip_code','address'];

    // User_id belongs users
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
