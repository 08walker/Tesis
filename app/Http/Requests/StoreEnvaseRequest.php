<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEnvaseRequest extends FormRequest
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
                Rule::unique('envases')->ignore($this->route('envase')->id)],
            'volumen_max_carga' => 'required|numeric|min:1',
            'tara' => 'required|numeric|min:1',
            //'es_propio'=>'required',
            'tercero_id' => 'required_if:organizacion_id,',
            'organizacion_id' => 'required_if:tercero_id,',
        ];
    }
    public function messages()
    {
        return [
            'identificador.required'=>'Debe introducir el identificador',
            'identificador.unique'=>'El identificador ya esta en uso',
            'volumen_max_carga.required' => 'Debe introducir el volumen',
            'volumen_max_carga.numeric' => 'Debe introducir el solo números ',
            'volumen_max_carga.min' => 'Debe introducir valores mayores que 0 ',
            'tara.required' => 'Debe introducir la tara',
            'tara.numeric' => 'Debe introducir el solo números ',
            'tara.min' => 'Debe introducir valores mayores que 0 ',
            'organizacion_id.required_if' => 'Debe llenar al tercero cuando no pertenece a la organizacion', 
            'tercero_id.required_if' => 'Debe llenar la organizacion cuando no pertenece a la tercero',
        ];
    }
}