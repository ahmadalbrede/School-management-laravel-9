<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    public $table='areas';

    public $timestamps=false;

    public $guarded=[];

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function name_address()
    {
        return $this->hasMany('App\Models\name_address');
    }
}
