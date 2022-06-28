<?php

namespace App\Http\Requests;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class SearchTeacherRequest extends FormRequest
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
