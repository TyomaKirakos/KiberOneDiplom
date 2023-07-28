<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  LoginValidation extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'login' => 'required|exists:users',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'Введите логин',
            'login.exists' => 'Такого логина не существует',
            'password.required' => 'Введите пароль',
            'password' => 'Неверный пароль',
        ];
    }
}
