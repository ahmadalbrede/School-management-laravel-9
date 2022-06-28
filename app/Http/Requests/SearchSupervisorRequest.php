<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchSupervisorRequest extends FormRequest
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
            'first_name'=>'regex:(^[A-Z a-z]+$)',

            'middle_name'=>'regex:(^[A-Z a-z]+$)',

            'last_name'=>'regex:(^[A-Z a-z]+$)',

            'dob'=>'date',

            'email'=>'email',

            'number_phone'=>'numeric'
        ];
    }
}
