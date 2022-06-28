<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
            'id'=>'required|integer',

            'first_name'=>'regex:(^[A-Z a-z]+$)',

        	'middle_name'=>'regex:(^[A-Z a-z]+$)',

        	'last_name'=>'regex:(^[A-Z a-z]+$)',

        	'email'=>'email',

        	'gender'=>'enum',

        	'password'=>'string',

            'number_phone'=>'numeric',

            'dob'=>'date'
        ];
    }
}
