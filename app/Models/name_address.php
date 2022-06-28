<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class name_address extends Model
{
    use HasFactory;

    public $table='name_addresses';

    public $timestamps=false;

    public $guarded=[];

    public function address()
    {
        return $this->hasMany('App\Models\Address');
    }

    public function area()
    {
        return $this->belongsTo('App\Models\Area','area_id');
    }
}
