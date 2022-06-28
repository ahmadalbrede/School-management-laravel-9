<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSupervisorRequest;
use App\Http\Requests\DestroySupervisorRequest;
use App\Http\Requests\SearchSupervisorRequest;
use App\Http\Requests\ShowSupervisorRequest;
use App\Http\Requests\UpdateSupervisorRequest;
use App\Models\Supervisor;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function addsupervisor(AddSupervisorRequest $req)
    {
        $supervisor=Supervisor::create($req->validated());

        return response(['success'=>true, "supervisor is "=>$supervisor]);
    }

    public function getallsupervisor()
    {
        $response=Supervisor::all();

        return response([ 'success'=>true, 'studet'=>$response  ]);
    }

    public function showsupervisor(ShowSupervisorRequest $req)
    {
        $id=$req->get('id');
        $response=Supervisor::where('id',$id)->first();

        if($response)
        {
            return response(['success'=>true, 'supervisor is'=>$response]);
        }

        else{
            return response(['success'=>false, 'massage'=>'not found ']);
        }
    }

    public function update(UpdateSupervisorRequest $req)
    {
        $id=$req->get('id');

        $response=Supervisor::where('id', $id)->first();

        if(!$response){
            return response(['success'=>false,'massage'=>'not found ']);
        }

        if($req->has('first_name')){
            $response->update(['first_name'=>$req->inpute('first_name')]);
        }

        if($req->has('middle_name')){
            $response->update(['middle_name'=>$req->inpute('middle_name')]);
        }

        if($req->has('last_name')){
            $response->update(['last_name'=>$req->inpute('last_name')]);
        }

        if($req->has('dob')){
            $response->update(['dob'=>$req->inpute('dob')]);
        }

        if($req->has('gender')){
            $response->update(['gender'=>$req->inpute('gender')]);
        }

        if($req->has('email')){
            $response->update(['email'=>$req->inpute('email')]);
        }

        if($req->has('password')){
            $response->update(['password'=>$req->inpute('password')]);
        }

        if($req->has('number_phone')){
            $response->update(['number_phone'=>$req->inpute('number_phone')]);
        }

        return response(['success'=>true, 'teacher'=>$response]);

    }

    public function destroy(DestroySupervisorRequest $req)
    {
        $id=$req->get('id');

        $res=Supervisor::where('id', $id)->first();

        if($res)
        {
            $res->delete();
            return response(['success '=>true]);
        }
        else{
            return response(['success'=>false , 'massage'=>'not found ']);
        }
    }

    public  function search(SearchSupervisorRequest $req)
    {
        $response=Supervisor::query();

        if($req->has('first_name')){

            $response=$response->where('first_name', $req->get('first_name'));
        }

        if($req->has('middle_name')){

            $response=$response->where('middle_name', $req->get('middle_name'));
        }

        if($req->has('last_name')){

            $response=$response->where('last_name', $req->get('last_name'));
        }

        if($req->has('dob')){

            $response=$response->where('dob', $req->get('dob'));
        }

        if($req->has('email')){

            $response=$response->where('email', $req->get('email'));
        }

        if($req->has('gender')){

            $response=$response->where('gender', $req->get('gender'));
        }

        $response=$response->get();

        if($response=='[]')
        {
            return response(['success'=>false, 'massage'=>'not found']);
        }

        return response(['success'=>true,'teacher'=>$response]);
    }
}
