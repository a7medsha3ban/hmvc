<?php

namespace Admins\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/|max:191',
            'password' => 'required|alpha_num|max:191|min:6',
        ];
    }
    public function  messages()
    {
        return [
            'email.required' => 'Email is Required',
            'email.email' => 'Valid Email',
            'password.required' => 'Password is Required'
        ];

    }
}
