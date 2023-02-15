<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicineCategory extends Model
{
    protected $fillable = ['category'];

    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }

}
