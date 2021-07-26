<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
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
            'year' => 'required',
            'budget' => 'required',
            'length' => 'required',
            'countries' => 'array',
            'creators' => 'array',
            'creators.*.roles' => 'array',
            'genres' => 'array'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Введите имя',
            'year.required' => 'Введите год',
            'budget.required' => 'Введите бюджет',
            'length.required' => 'Введите время фильма'
        ];
    }
}
