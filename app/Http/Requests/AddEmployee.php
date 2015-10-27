<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddEmployee extends Request
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
            'name' => 'required|unique:users|min:3|max:25',
            'email' => 'required|unique:users|email',
            'rankid' => 'required|integer',
            'divisionid' => 'required|integer',
            'experienceid' => 'required|integer',
        ];
    }
}
