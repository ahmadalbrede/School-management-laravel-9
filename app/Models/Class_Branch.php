<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class_Branch extends Model
{
    use HasFactory;

    public $table='class-branches';

    public $timestamps=false;

    public $guarded=[];
}
