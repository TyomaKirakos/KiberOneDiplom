<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidation extends FormRequest
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
            'name' => 'required|min:2|max:30',
            'img' => 'required',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите название',
            'name.min' => 'Название должно быть длиннее 2 символов',
            'name.max' => 'Название должно быть короче 30 символов',
            'img.required' => 'Введите путь к картинке',
            'price.required' => 'Введите цену',
        ];
    }
}
