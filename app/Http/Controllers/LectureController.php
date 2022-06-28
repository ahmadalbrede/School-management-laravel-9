<?php

namespace App\Http\Controllers;

use App\Http\Requests\lecture\AddLectureRequest;
use App\Http\Requests\lecture\DestroyLectureRequest;
use App\Http\Requests\lecture\UpdateLectureRequest;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function addlecture(AddLectureRequest $req){

        $res=Lecture::create($req->validated());

        return response(['success'=>true, 'lecture'=>$res]);
    }

    public function getalllecture(){

        $res=Lecture::all();

        return response(['success'=>true, 'lecture'=>$res]);
    }

    public function update(UpdateLectureRequest $req){

        $id=$req->get('id');

        $res=Lecture::where('id', $id)->first();

        if(!$res){

            return response(['success'=>false,'massage'=>'not found']);
        }

        if($req->has('name')){

            $res->update(['name'=>$req->inpute('name')]);
        }

        return response(['success'=>true, 'lecture'=>$res]);

    }

    public function destroy(DestroyLectureRequest $req){
        $id=$req->get('id');

        $res=Lecture::where('id',$id)->firest();

        if(!$res){

            return response(['success'=>false,'massage'=>'not found']);
        }

        else{
            $res->delete();

            return response(['success'=>true]);
        }
    }
}
