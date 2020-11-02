<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTUnidadMRequest extends FormRequest
{
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
            'name'=>['required',
                     'min:3',
                    ],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Debe introducir el nombre',
            'name.min'=>'El nombre debe tener mas de 3 caracteres',
        ];
    }
}
