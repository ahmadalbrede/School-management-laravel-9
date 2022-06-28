<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;
class Student extends Model
{
    use HasFactory;

    public $table ='students';

    public $timestamps=false;

    public $guarded=[];

    public function address(){

        return $this->belongsTo('App\Models\Address','address_id');
    }
}
