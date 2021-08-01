<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'code' => 'required|string|min:5|max:20|unique:animals,code',
            'name' => 'required|string|min:5|max:100|unique:animals,name',
            'born_date' => 'required|date|before:tomorrow',
            'age_classification' => 'required|string|min:5|max:100',
            'sex' => 'required|string|min:5|max:100',
            'production_classification' => 'required|string|min:5|max:100',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['code'] .= ",{$this->animal}";
            $rules['name'] .= ",{$this->animal}";
        }

        return $rules;
    }
}
