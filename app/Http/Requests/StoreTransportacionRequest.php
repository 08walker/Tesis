<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransportacionRequest extends FormRequest
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
            'numero'=>'required|min:1',
            'equipo_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'numero.required'=>'El número es obligatorio',
            'numero.min'=>'El número debe tener más de 1 caracter',
            'equipo_id.required'=>'Debe seleccionar el equipo',
        ];
    }
}
