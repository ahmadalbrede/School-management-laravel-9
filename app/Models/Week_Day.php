<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week_Day extends Model
{
    use HasFactory;

    public $table='week_days';

    public $timestamps=false;

    public $guarded=[];
}
