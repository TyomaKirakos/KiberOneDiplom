<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationValidation extends FormRequest
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
            'fullname' => 'required|min:5|regex:/^[А-Яа-яÀ-ÿЁё\s]+$/',
            'phone' => 'required|regex:/\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}/',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Введите ФИО',
            'fullname.min' => 'ФИО должно включать минимум 5 символов',
            'fullname.regex' => 'Введите ФИО корректно',
            'phone.required' => 'Введите ваш номер телефона',
            'phone.regex' => 'Введите номер телефона корректно',
        ];
    }
}
