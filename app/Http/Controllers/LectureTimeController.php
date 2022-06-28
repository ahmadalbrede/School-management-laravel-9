<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyAddressRequest;
use App\Http\Requests\lecture_time\Update_L_T_Request;
use App\Models\Day;
use App\Models\lecture_Time;
use Illuminate\Http\Request;

class LectureTimeController extends Controller
{
    public function create(){


    }

    public function getalltime(){

        $res=lecture_Time::all();

        return response(['success'=>true, 'lecture times'=>$res]);
    }

    public function update(Update_L_T_Request $req){

        $id=$req->get('id');

        $res=lecture_Time::where('id', $id)->first();

        if(!$res){

            return response(['success'=>false,'massage'=>'not found']);
        }

        if($req->has('begin')){

            $res->update(['begin'=>$req->inpute('begin')]);
        }

        if($req->has('end')){

            $res->update(['end'=>$req->inpute('end')]);
        }

        if($req->has('day_id')){

            $res->update(['day_id'=>$req->inpute('day_id')]);
        }

        if($req->has('lecture_id')){

            $res->update(['lecture_id'=>$req->inpute('lecture_id')]);
        }

        return response(['success'=>true, 'day'=>$res]);

    }

    public function destroy(DestroyAddressRequest $req){

        $id=$req->get('id');

        $res=lecture_Time::where('id',$id)->firest();

        if(!$res){

            return response(['success'=>false,'massage'=>'not found']);
        }

        else{
            $res->delete();

            return response(['success'=>true]);
        }
    }
}
