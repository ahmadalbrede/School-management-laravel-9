<?php

namespace App\Http\Controllers;

use App\Http\Requests\day\AddDayRequest;
use App\Http\Requests\day\DeleteDayRequest;
use App\Http\Requests\day\UpdateDayRequest;
use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function addday(AddDayRequest $req){

        $res=Day::create($req->validated());

        return response(['success'=>true, 'day'=>$res]);
    }

    public function getallday(){

        $res=Day::all();

        return response(['success'=>true, 'days'=>$res]);
    }

    public function update(UpdateDayRequest $req){

        $id=$req->get('id');

        $res=Day::where('id', $id)->first();

        if(!$res){

            return response(['success'=>false,'massage'=>'not found']);
        }

        if($req->has('name')){

            $res->update(['name'=>$req->inpute('name')]);
        }

        return response(['success'=>true, 'day'=>$res]);

    }

    public function destroy(DeleteDayRequest $req){

        $id=$req->get('id');

        $res=Day::where('id',$id)->firest();

        if(!$res){

            return response(['success'=>false,'massage'=>'not found']);
        }

        else{
            $res->delete();

            return response(['success'=>true]);
        }
    }
}
