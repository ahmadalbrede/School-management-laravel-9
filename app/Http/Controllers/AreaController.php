<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAreaRequest;
use App\Http\Requests\DestroyAreaRequest;
use App\Http\Requests\ShowAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function addarea(AddAreaRequest $request)
    {
        $area=Area::create($request->validated());

        return response(['success'=>true,'area'=>$area]);
    }

    public function gatallarea()
    {
        $area=Area::all();

        return response(['success'=>true , 'areas is '=>$area]);
    }

    public function showarea(ShowAreaRequest $req)
    {
        $id=$req->get('id');

        $area=Area::where('id', $id)->first();

        if($area){
            return response(['success'=>true, 'area'=>$area]);
        }

        else{
            return response(['success'=>false, "masssage"=>"not found "]);
        }
    }

    public function update(UpdateAreaRequest $req)
    {
        $id=$req->get('id');

        $area=Area::where('id', $id)->first();

        if(!$area){
            return response(['success'=>false , 'massage'=>'not found ']);
        }

        if($req->has('name'))
        {
            $area->update([
                "name"=>$req->input('name')
            ]);
        }

        if($req->has('city_id')){

            $area->update(["city_id"=>$req->input('city_id')]);
        }

        return response(['success'=>true]);


    }

    public function destroy(DestroyAreaRequest $req)
    {
        $id=$req->get('id');

        $area=Area::where('id', $id)->first();

        if(!$area)
        {
            return response(['success'=>false , 'massage'=>'not found ']);
        }

        else{
            $area->delete();
            return response(['success'=>true]);
        }

    }
}
