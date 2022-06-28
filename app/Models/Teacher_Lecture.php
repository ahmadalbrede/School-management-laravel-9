<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher_Lecture extends Model
{
    use HasFactory;

    public $table='teacher_lectures';

    public $timestamps=false;

    public $guarded=[];
}
