<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parnt extends Model
{
    use HasFactory;

    public $table ='parnts';

    public $timestamps=false;

    public $guarded=[];
}
