<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'first_name'=>"regex:(^[A-Z a-z]+$)",

            'middle_name'=>"regex:(^[A-Z a-z]+$)",

            'last_name'=>"regex:(^[A-Z a-z]+$)",

            //'gender'

            'number_phone'=>"string",

            'dob'=>"date",

            'email'=>"email"
        ];
    }
}
