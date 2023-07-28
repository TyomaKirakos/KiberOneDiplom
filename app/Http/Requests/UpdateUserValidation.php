<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserValidation extends FormRequest
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
            'birthdate' => 'required|date',
            'money' => 'required|integer',
            'group_id' => 'required',
            'contact' => 'required|min:5|max:20',
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
            'birthdate.required' => 'Введите дату рождения',
            'birthdate.date' => 'Введите дату корректно',
            'money.required' => 'Введите кол-во киберонов',
            'money.integer' => 'Введите целое число',
            'group_id.required' => 'Выберите группу',
            'contact.required' => 'Введите телефон, e-mail или иной контакт',
            'contact.min' => 'Длина контакта должна быть от 5 символов',
            'contact.max' => 'Длина контакта должна быть до 20 символов',
        ];
    }
}
