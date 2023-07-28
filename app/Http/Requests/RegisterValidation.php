<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidation extends FormRequest
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
            'surname' => 'required|min:2|regex:/^[А-Яа-яÀ-ÿЁё\s]+$/',
            'name' => 'required|min:2|regex:/^[А-Яа-яÀ-ÿЁё\s]+$/',
            'login' => 'required|unique:users|min:5|max:30',
            'birthdate' => 'required|date',
            'gender' => 'required',
            'money' => 'required|integer',
            'role' => 'required',
            'group_id' => 'required',
            'contact' => 'required|min:5|max:20',
            'password' => 'required|min:5|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'surname.required' => 'Введите фамилию',
            'surname.min' => 'Длина фамилии должна быть от 2 символов',
            'surname.regex' => 'Фамилия должна быть на кириллице',
            'name.required' => 'Введите имя',
            'name.min' => 'Длина имени должна быть от 2 символов',
            'name.regex' => 'Имя должно быть на кириллице',
            'login.required' => 'Введите логин',
            'login.unique' => 'Этот логин уже занят',
            'login.min' => 'Длина логина должна быть от 5 символов',
            'login.max' => 'Длина логина должна быть до 30 символов',
            'birthdate.required' => 'Введите дату рождения',
            'birthdate.date' => 'Введите дату корректно',
            'gender.required' => 'Выберите пол',
            'money.required' => 'Введите кол-во киберонов',
            'money.integer' => 'Введите целое число',
            'role.required' => 'Выберите статус',
            'group_id.required' => 'Выберите группу',
            'contact.required' => 'Введите телефон, e-mail или иной контакт',
            'contact.min' => 'Длина контакта должна быть от 5 символов',
            'contact.max' => 'Длина контакта должна быть до 20 символов',
            'password.required' => 'Введите пароль',
            'password.min' => 'Длина пароля должна быть от 5 символов',
            'password.confirmed' => 'Пароли должны совпадать',
        ];
    }
}
