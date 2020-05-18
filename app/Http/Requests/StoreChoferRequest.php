<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreChoferRequest extends FormRequest
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
            'ci'=>
                ['required',
                'size:11',
                 Rule::unique('choferes')->ignore($this->route('chofer')->id)
             ],
            'licencia'=>
                ['required',
                 Rule::unique('choferes')->ignore($this->route('chofer')->id)],
            'telefono'=>'required',
            'equipo_id'=>'required',
            //'es_propio'=>'required',
            'tercero_id' => 'required_if:organizacion_id,',
            'organizacion_id' => 'required_if:tercero_id,',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Debe introducir el nombre',
            'name.min'=>'El nombre debe tener mas de 3 caracteres',
            'ci.required'=>'Debe introducir el carnet de identidad',
            'ci.size'=>'El carnet debe tener 11 dígitos',
            'ci.unique'=>'El carnet ya está en uso',
            'licencia.required'=>'Debe introducir la licencia',
            'licencia.unique'=>'La licencia está en uso',
            'telefono.required'=>'Debe introducir el teléfono',
            'equipo_id.required'=>'Debe seleccionar el equipo por defecto',
            'organizacion_id.required_if' => 'Debe llenar al tercero cuando no pertenece a la organizacion', 
            'tercero_id.required_if' => 'Debe llenar la organizacion cuando no pertenece a la tercero',
        ];
    }
}