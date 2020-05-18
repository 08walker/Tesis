<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEquipoRequest extends FormRequest
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
            'identificador'=>
                ['required',
                'size:7',
                Rule::unique('equipos')->ignore($this->route('equipo'))],
            'volumen_max_carga' => 'required|numeric|min:1',
            'peso_max_carga' => 'required|numeric|min:1',
            'tara' => 'required|numeric|min:1',
            //'puede_cargar'=>'required',
            //'es_propio'=>'required',
            'tipo_equipo_id'=>'required',
            'tercero_id' => 'required_if:organizacion_id,',
            'organizacion_id' => 'required_if:tercero_id,',
        ];
    }

    public function messages()
    {
        return [
            'identificador.required'=>'Debe introducir la chapa.',
            'identificador.size'=>'La chapa debe tener 7 caracteres.',
            'identificador.unique'=>'La chapa ya existe.',
            'volumen_max_carga.required' => 'Debe introducir el volumen ',
            'volumen_max_carga.numeric' => 'Debe introducir el solo números ',
            'volumen_max_carga.min' => 'Debe introducir valores mayores que 0 ',
            'peso_max_carga.required' => 'Debe introducir el peso',
            'peso_max_carga.numeric' => 'Debe introducir el solo números ',
            'peso_max_carga.min' => 'Debe introducir valores mayores que 0 ',
            'tara.required' => 'Debe introducir la tara',
            'tara.numeric' => 'Debe introducir el solo números ',
            'tara.min' => 'Debe introducir valores mayores que 0 ',
            'tipo_equipo_id.required'=>'Debe seleccionar el tipo de equipo',
            'organizacion_id.required_if' => 'Debe llenar al tercero cuando no pertenece a la organizacion', 
            'tercero_id.required_if' => 'Debe llenar la organizacion cuando no pertenece a la tercero',
        ];
    }
}
