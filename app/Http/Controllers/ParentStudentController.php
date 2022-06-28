<?php

namespace App\Http\Controllers;

use App\Http\Requests\st_pa\Show_pa_stRequest;
use App\Http\Requests\st_pa\Show_st_paRequest;
use App\Models\Parent_Student;
use Illuminate\Http\Request;

class ParentStudentController extends Controller
{
    public function show_st_pa(Show_st_paRequest $req){

        $id=$req->get('id');

        $res=Parent_Student::where('id',$id)->all();

        if($res){
            return response(['success'=>true,'children'=>$res]);
        }

        else{
            return response(['success'=>false, 'massage'=>'not found']);
        }
    }

    public function show_pa_st(Show_pa_stRequest $req){

        $id=$req->get('id');

        $res=Parent_Student::where('id',$id)->all();

        if($res){
            return response(['success'=>true,'parents'=>$res]);
        }

        else{
            return response(['success'=>false, 'massage'=>'not found']);
        }
    }
}


