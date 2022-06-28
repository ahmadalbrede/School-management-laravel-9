<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAddressRequest;
use App\Http\Requests\DestroyAddressRequest;
use App\Http\Requests\ShowAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function create(AddAddressRequest $request)
    {
        $address=Address::create($request->validated());

        return response(['success'=>true, 'address'=>$address]);
    }


    // public function showaddress(ShowAddressRequest $req)
    // {

    //     $id=$req->get('id');

    //     $respons=Address::where('id',$id)->first();

    //     if(!$respons)
    //     {
    //         return response(['success' => false, 'message' => 'not found']);
    //     }


    //     else{
    //         return response([ 'success'=>true, 'address'=>$respons  ]);
    //     }
    // }

public function update(UpdateAddressRequest $req){

        $id=$req->get('id');

        $res=Address::where('id', $id)->first();

        if(!$res){
            return response(['success'=>false , 'massage'=>'not found ']);
        }

        if($req->has('telphone'))
        {
            $res->update([
                "telphone"=>$req->input('telphone')
            ]);
        }

        if($req->has('city_id')){

            $res->update(["city_id"=>$req->input('city_id')]);
        }

        return response(['success'=>true]);


    }

    public function destroy(DestroyAddressRequest $req)
    {
        $id=$req->get('id');

        $res=Address::where('id', $id)->first();

        if(!$res)
        {
            return response(['success'=>false , 'massage'=>'not found ']);
        }

        else{
            $res->delete();
            return response(['success'=>true]);
        }

    }


}
