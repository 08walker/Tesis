<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTEquipoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>['required',
                     'min:3',
                     Rule::unique('tipo_equipo')->ignore($this->route('tipoEquipo'))],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Debe introducir el nombre',
            'name.min'=>'El nombre debe tener mas de 3 caracteres',
            'name.unique'=>'El nombre ya esta en uso',
        ];
    }
}
