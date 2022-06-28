<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public $table='addresses';

    public $timestamps=false;

    public $guarded=[];

    public function student()
    {
        return $this->hasMany('App\Models\Student');
    }

    public function address_name()
    {
        return $this->belongsTo('App\Models\name_address','name_address_id');
    }
}
