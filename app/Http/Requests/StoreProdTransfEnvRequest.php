<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdTransfEnvRequest extends FormRequest
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
            //'cantidad_bultos'=>'numeric|min:1',
        'peso_kg'=>'required|numeric|min:1',
        'volumen_m3'=>'required|numeric|min:1',
        'producto_id'=>'required',
        ];
    }

    public function messages()
    {
        return [
            //'cantidad_bultos.numeric'=>'Debe introducir un número',
            'peso_kg.required'=>'Debe introducir el peso',
            'volumen_m3.required'=>'Debe introducir el volumen',
            'producto_id.required'=>'Debe seleccionar el producto',
            'peso_kg.numeric'=>'Debe introducir un número',
            'volumen_m3.numeric'=>'Debe introducir un número',
            'peso_kg.min'=>'Debe introducir valores mayores que 0',
            'volumen_m3.min'=>'Debe introducir valores mayores que 0',
            'cantidad_bultos.min'=>'Debe introducir valores mayores que 0',          
        ];
    }
}
