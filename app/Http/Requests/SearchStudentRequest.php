<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
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

            'number_phone'=>"string",

            'email'=>"email",

            'dob'=>"date",

            'photo_url'=>"string"

           // 'gender'=>"regex:(^[A-Z a-z]+$)"
        ];
    }
}
