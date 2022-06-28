<?php

namespace App\Http\Controllers;

use App\Http\Requests\Address_nameRequest;
use App\Http\Requests\DestroyAddress_nameRequest;
use App\Http\Requests\UpdateAddress_nameRequest;
use App\Models\name_address;
use Illuminate\Http\Request;

class NameAddressController extends Controller
{
    public function add_adress_name(Address_nameRequest $req)
    {
        $res=name_address::create($req->validated());

        return response(['success'=>true, 'address_name'=>$res]);
    }

    public function get_name_address()
    {
        $res=name_address::all();

        return response(['success'=>true,'address_name'=>$res]);

    }

    // public function show(){

    // }

    public function update(UpdateAddress_nameRequest $req)
    {
            $id=$req->get('id');

            $res=name_address::where('id',$id)->first();

            if(!$res)
            {
                return response(['success'=>false,'massage'=>'not found']);
            }

            if($req->has('name_address'))
            {
                $res->update([
                    'name_address'=>$req->input('name_address')
                ]);
            }

            if($req->has('area_id'))
            {
                $res->update([
                    'area_id'=>$req->input('area_id')
                ]);
            }
            return response(['success'=>true]);

    }

    public function destroy(DestroyAddress_nameRequest $req)
    {
            $id=$req->get('id');

            $res=name_address::where('id' , $id)->first();

            if($res){

                $res->delete();
                return response(['success'=>true]);
            }

            else
            {
                return response(['success'=>false,'massage'=>'not found']);
            }
    }
}
