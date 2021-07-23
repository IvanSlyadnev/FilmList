<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatorRequest extends FormRequest
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
            'name' => 'required',
            'age' => 'required',
            'country_id' => 'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Введите имя',
            'age.required' => 'Введите возраст',
            'country_id.required' => 'Выбирите страну'
        ];
    }
}
