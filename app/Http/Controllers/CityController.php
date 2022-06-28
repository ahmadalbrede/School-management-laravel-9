<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCityRequest;
use App\Http\Requests\DestroyCityRequest;
use App\Http\Requests\ShowCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function addcity(AddCityRequest $req)
    {
        City::insert([

            'name'=>$req->input('name')
        ]);

        return response(['success'=>true]);
    }

    public function getallcity()
    {
        $city=City::all();

        if(!$city)
        {
            return response(['massage'=> "there's no city"]);
        }

        else
        {
            return response(['cities is'=>$city]);
        }

    }

    public function showcity(ShowCityRequest $req)
    {
            $id=$req->get('id');

            $city=city::where('id',$id)->first();

            if(!$city)
            {
                return response(['success'=>false,'massage'=>'not found']);
            }

            else{
                return response(['success'=>true, 'city is '=> $city]);
            }

    }

    public function update(UpdateCityRequest $req)
    {
            $id=$req->get('id');

            $city=city::where('id',$id)->first();

            if(!$city)
            {
                return response(['success'=>false,'massage'=>'not found']);
            }

            if($req->has('name'))
            {
                $city->update([
                    'name'=>$req->input('name')
                ]);

                return response(['success'=>true]);
            }

    }

    public function destroy(DestroyCityRequest $req)
    {
            $id=$req->get('id');

            $city=City::where('id' , $id)->first();

            if($city){

                $city->delete();
                return response(['success'=>true]);
            }

            else
            {
                return response(['success'=>false,'massage'=>'not found']);
            }
    }



}
