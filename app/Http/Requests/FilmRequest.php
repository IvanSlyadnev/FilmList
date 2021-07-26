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
            'film.name' => 'required',
            'film.year' => 'required',
            'film.budget' => 'required',
            'film.length' => 'required',
            'film.countries' => 'array',
            'film.creators' => 'array',
            'film.creators.*.roles' => 'array',
            'film.genres' => 'array'
        ];
    }

    public function messages() {
        return [
            'film.name.required' => 'Введите имя',
            'film.year.required' => 'Введите год',
            'film.budget.required' => 'Введите бюджет',
            'film.length.required' => 'Введите время фильма'
        ];
    }
}
