<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weekly_Program extends Model
{
    use HasFactory;

    public $table='weekly_programs';

    public $timestamps=false;

    public $guarded=[];
}
