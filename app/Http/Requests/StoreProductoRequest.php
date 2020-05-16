<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
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
            'name'=>'required|min:3',
            'identificador'=>'required',
            'unidad_medida_id'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Debe introducir el nombre',
            'name.min'=>'El nombre debe tener mas de 3 caracteres',
            //'name.unique'=>'El nombre ya esta en uso',
            'identificador.required'=>'Debe introducir el identificador',
            'unidad_medida_id.required'=>'Debe seleccionar la unidad de medida',
        ];
    }
}