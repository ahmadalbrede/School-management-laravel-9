<?php

namespace App\Http\Requests\st_pa;

use Illuminate\Foundation\Http\FormRequest;

class Show_st_paRequest extends FormRequest
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
            'parnt_id'=>'required|integer'
        ];
    }
}
