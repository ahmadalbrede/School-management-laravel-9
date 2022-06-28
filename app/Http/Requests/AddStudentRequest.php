<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            // 'first_name_en'=>"required|regex:(^[A-Z a-z]+$)",

            'first_name_ar'=>'required|regex:(^[\ء-ي\s]+$)',

            'middle_name_ar'=>'required|regex:(^[\ء-ي\s]+$)',

            'last_name_ar'=>'required|regex:(^[\ء-ي\s]+$)',

            // 'middle_name_en'=>"required|regex:(^[A-Z a-z ]+$)",

            // 'last_name_en'=>"required|regex:(^[A-Z a-z]+$)",

            'number_phone'=>"required|numeric",

            'dob'=>"required|date",

            'gender'=>"required",

            //'address_id'=>'required|integer',

            'photo'=>'required|image',

            'telphone'=>'required|numeric',
            'name_address_id'=>'required|integer'

            // 'email'=>"required|regex:(^[a-z A-Z 0-9]+@[a-z A-Z]+.[a-z A-Z]+$)"
            //'gender_id'=>"required"
        ];
    }
}
