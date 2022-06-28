<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSupervisorRequest extends FormRequest
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
            'first_name'=>"required|regex:(^[A-Z a-z]+$)",

            'middle_name'=>"required|regex:(^[A-Z a-z]+$)",

            'last_name'=>"required|regex:(^[A-Z a-z]+$)",

            'number_phone'=>"required|numeric",

            'gender'=>'required',

            'password'=>'required|string',

            'email'=>'required|email',

            'dob'=>'required|date'
        ];
    }
}
