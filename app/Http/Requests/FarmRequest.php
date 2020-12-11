<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FarmRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
//            'name' => 'required|string|min:5|max:255|unique:farms,name',
            'name' => 'required|string|min:5|max:255',
            'cep' => 'required|string|min:9|max:10',
            'city' => 'required|string|min:5|max:255',
            'state_id' => 'required',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['name'] .= ",{$this->farm}";
        }

        return $rules;
    }
}
