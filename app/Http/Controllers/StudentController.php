<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStudentRequest;
use App\Http\Requests\DestroyStudentRequest;
use App\Http\Requests\SearchStudentRequest;
use App\Http\Requests\ShowStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use App\Http\Controllers\getClientOriginalName;
use Illuminate\Support\Facades\Hash;
use App\Models\Address;

class StudentController extends Controller
{
    public function addstudent(AddStudentRequest $request)
    {
        /*
            insert => boolean
            insertGetId => record id
            create => instance of model
        */

        // $request->only([
        //     'first_name_ar',
        //     'last_name_ar'
        // ]);

        // $request->except(['is_admin'])

        // $request->all();

        // $request->validated()

        // $req=$request->except(['telphone','name_address_id']);


        $student= Student::create($request->except(['telphone','name_address_id','photo']));

        $addressId = Address::insertGetId([
            'telphone' => 'telphone',
            'name_address_id' => 'name_address_id'
        ]);

        $photo=$request->photo;
        $newphoto=time().$photo->getClientOriginalName();
        $photo->move('images/student_images'.$newphoto);

        $email=$student['first_name_ar'] . '-' . $student['id'] .'@email.com';

        $password=Hash::make($student['phone_number']);

        $student->update([

            'email'=>$email,

            'password'=>$password,

            'password_change_date'=> now(),

            'address_id'=>$addressId,

            'photo'=>'images/student_images/'.$newphoto

            // 'address_id' => $addressId
        ]);

        return response(['success'=>true, 'student' => $student]);
    }

    public function showstudent(ShowStudentRequest $request)
    {
        $id=$request->get('id');


        $respons= Student::where('students.id',$id)
        ->join("addresses","addresses.id","=","students.address_id")
        ->join("name_addresses","addresses.name_address_id","=","name_addresses.id")
        ->join("areas","name_addresses.area_id","=","areas.id")
        ->join("cities","areas.city_id","=","cities.id")
        ->get(['students.*',
        'addresses.telphone as telphone',
        'name_addresses.name_address as name_address',
        'areas.name as area_name_ar',
        'cities.name as city_name_ar'])->first();

        if(!$respons)
        {
            return response(['success' => false, 'message' => 'not found']);
        }


        else{
            return response([ 'success'=>true, 'studet'=>$respons  ]);
        }
    }

    public function getallstudent()
    {
        $respons=Student::all();

        return response([ 'success'=>true, 'studet'=>$respons  ]);
    }

    public function update(UpdateStudentRequest $request){

        $id=$request->get('id');

        $student=Student::where('id',$id)->first();
        if(!$student)
        {
            return response(['success'=>false,]);
        }

        if($request->has('first_name_ar'))
        {
            $student->update(['first_name_ar'=>$request->input('first_name_ar')]);
        }

        if($request->has('middle_name_ar'))
        {
            $student->update(['middle_name_ar'=>$request->input('middle_name_ar')]);
        }

        if($request->has('last_name_ar'))
        {
            $student->update(['last_name_ar'=>$request->input('last_name_ar')]);
        }

        if($request->has('gender'))
        {
            $student->update(['gender'=>$request->input('gender')]);
        }

        if($request->has('number_phone'))
        {
            $student->update(['number_phone'=>$request->input('number_phone')]);
        }

        if($request->has('dob'))
        {
            $student->update(['dob'=>$request->input('dob')]);
        }

        if($request->has('email'))
        {
            $student->update(['email'=>$request->input('email')]);
        }

        if($request->get('photo'))
        {
            $student->update(['photo'=>$request->input('photo')]);
        }

        return response(['success'=>true]);

    }

    //// get()

    public function destroy(DestroyStudentRequest $request)
    {
        $id=$request->get('id');

        $student=Student::where('id',$id)->first();

        if(!$student)
        {
            return response(['success'=>false,'massage'=>'not fond']);
        }

        $student->delete();

        return response(['success'=>true]);
    }

    public function search(SearchStudentRequest $request)
    {


        $student = Student::query();
       // $student=[];

        if($request->has('first_name_ar')) {
            $student =$student->where('first_name_ar', $request->get('first_name_ar'));
        }


        if($request->has('middle_name_ar')) {
            $student = $student->where('middle_name_ar', $request->get('middle_name_ar'));
        }

        if($request->has('last_name_ar')) {
            $student = $student->where('last_name_ar', $request->get('last_name_ar'));
        }

        if($request->has('gender')) {
            $student = $student->where('gender', $request->get('gender'));
        }

        if($request->has('number_phone')){
            $student=$student->where('number_phone',$request);
        }

        if($request->has('dob')){
            $student=$student->where('dob',$request);
        }

        if($request->has('registretion_date')){
            $student=$student->where('registretion_date',$request);
        }


        $student = $student->get();

        if($student != '[]'){
            return response(['success'=>true,"student"=>$student]);
        }

        else
        {
            return response(['success'=>false,'massage'=>"not found"]);
        }



        // if(request()->get('first_name_ar','middle_name_ar','last_name_ar'))
        // {
        //     $name=request()->get('first_name_ar','middle_name_ar','last_name_ar');

        //     $student=Student::where([['first_name_ar',$name('first_name_ar')],

        //     ['middle_name_ar',$name('middle_name_ar')],

        //     ['last_name_ar',$name('last_name_ar')]])->get();

        //     if($student)
        //     {
        //         return response(['success'=>true, 'student'=>$student]);
        //     }

        //     else
        // {
        //     return response(['success'=>false , 'massage'=>'not found']);
        // }


        // }

        // if(request()->get('first_name_ar','middle_name_ar'))
        // {
        //     $name=request()->get('first_name_ar','middle_name_ar');

        //     $student=Student::where([['first_name_ar',$name('first_name_ar')],

        //     ['middle_name_ar',$name('middle_name_ar')],
        //     ])->get();

        //     if($student)
        //     {
        //         return response(['success'=>true, 'student'=>$student]);
        //     }

        //     else
        // {
        //     return response(['success'=>false , 'massage'=>'not found']);
        // }


        // }

        // if(request()->get('first_name_ar','last_name_ar'))
        // {
        //     $name=request()->get('first_name_ar','last_name_ar');

        //     $student=Student::where([['first_name_ar',$name('first_name_ar')],

        //     ['last_name_ar',$name('last_name_ar')]])->get();

        //     if($student)
        //     {
        //         return response(['success'=>true, 'student'=>$student]);
        //     }

        //     else
        // {
        //     return response(['success'=>false , 'massage'=>'not found']);
        // }


        // }
        // if(request()->get('first_name_ar'))
        // {
        //     $first_name_ar=request()->get('first_name_ar');
        //     $student=Student::where('first_name_ar','like','%'.$first_name_ar)->all();

        // if($student)
        // {
        //     return response(['success'=>true, 'students'=>$student]);
        // }

        // else
        // {
        //     return response(['success'=>false , 'massage'=>'not found']);
        // }

        // }

        // if(request()->get('gender'))
        // {
        //     $gender=request()->get('gender');
        //     $student=Student::where('gender','like','%'.$gender)->all();

        // if($student)
        // {
        //     return response(['success'=>true, 'students'=>$student]);
        // }

        // else
        // {
        //     return response(['success'=>false , 'massage'=>'not found']);
        // }

        // }

        // if(request()->get('middle_name_ar'))
        // {
        //     $middle_name_ar=request()->get('middle_name_ar');
        //     $student=Student::where('middle_name_ar','like','%'.$middle_name_ar)->all();

        // if($student)
        // {
        //     return response(['success'=>true, 'students'=>$student]);
        // }

        // else
        // {
        //     return response(['success'=>false , 'massage'=>'not found']);
        // }

        // }

        // if(request()->get('last_name_ar'))
        // {
        //     $last_name_ar=request()->get('last_name_ar');
        //     $student=Student::where('last_name_ar','like','%'.$last_name_ar)->all();

        // if($student)
        // {
        //     return response(['success'=>true, 'students'=>$student]);
        // }

        // else
        // {
        //     return response(['success'=>false , 'massage'=>'not found']);
        // }

        // }

        // if(request()->get('number_phone'))
        // {
        //     $number_phone=request()->get('number_phone');
        //     $student=Student::where('number_phone','like','%'.$number_phone)->all();

        // if($student)
        // {
        //     return response(['success'=>true, 'students'=>$student]);
        // }

        // else
        // {
        //     return response(['success'=>false , 'massage'=>'not found']);
        // }

        // }

        // if(request()->get('dob'))
        // {
        //     $dob=request()->get('dob');
        //     $student=Student::where('dob','like','%'.$dob)->all();

        // if($student)
        // {
        //     return response(['success'=>true, 'students'=>$student]);
        // }

        // else
        // {
        //     return response(['success'=>false , 'massage'=>'not found']);
        // }

        // }

        // if(request()->get('registretion_date'))
        // {
        //     $date=request()->get('registretion_date');
        //     $student=Student::where('registretion_date',$date)->all();

        //     if($student)
        //     {
        //         return response(['success'=>true,'student'=>$student]);
        //     }
        //     else
        //     {
        //         return response(['success'=>false , 'massage'=>'not found']);
        //     }


        // }

        // if(request()->get('photo_url'))
        // {

        //     $photo=request()->get('photo_url');
        //     $student=Student::where('photo_url',$photo)->all();

        //     if($student)
        //     {
        //         return response(['success'=>true,'student'=>$student]);
        //     }
        //     else
        //     {
        //         return response(['success'=>false,'massage'=>'not found']);
        //     }
        // }
    }


}
