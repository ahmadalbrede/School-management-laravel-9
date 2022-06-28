<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddParntRequest as RequestsAddParntRequest;
use App\Http\Requests\AddParntRequest;
use App\Http\Requests\DestroyParntRequest;
use App\Http\Requests\ShowParntRequest;
use App\Http\Requests\UpdateParntRequest;
use App\Models\Parent_Student;
use App\Models\Parnt;
use Illuminate\Http\Request;

class ParntController extends Controller
{
    public function addparnt(AddParntRequest $req)
    {
        $parnt=Parnt::insertGetId($req->validated());

        Parent_Student::insert([

            'student_id'=>$req->input('student_id'),
            'parnt_id'=>$parnt,
            'relation'=>$req->input('relation')
        ]);



        return response(['success'=>true, 'parents is '=>$parnt]);




    }

    // public function getallparnt()
    // {
    //     $response=Parnt::all();

    //     return response([ 'success'=>true, 'studet'=>$response  ]);
    // }

    public function showparnt(ShowParntRequest $req)
    {
        $id=$req->get('id');
        $response=Parnt::where('id',$id)->first();

        if($response)
        {
            return response(['success'=>true, 'parent is'=>$response]);
        }

        else{
            return response(['success'=>false, 'massage'=>'not found ']);
        }
    }

    public function update(UpdateParntRequest $req)
    {
        $id=$req->get('id');

        $response=Parnt::where('id', $id)->first();

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

    public function destroy(DestroyParntRequest $req)
    {
        $id=$req->get('id');

        $res=Parnt::where('id', $id)->first();

        if($res)
        {
            $res->delete();
            return response(['success '=>true]);
        }
        else{
            return response(['success'=>false , 'massage'=>'not found ']);
        }
    }
}
