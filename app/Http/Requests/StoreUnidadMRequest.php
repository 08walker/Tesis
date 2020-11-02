<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUnidadMRequest extends FormRequest
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
            'name'=>['required',
                     'min:3',
                      Rule::unique('unidad_medida')->ignore($this->route('unidadMedida'))],
            'identificador' =>['required',
                      Rule::unique('unidad_medida')->ignore($this->route('unidadMedida'))],
            'tipo_unidad_medida_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Debe introducir el nombre',
            'name.min'=>'El nombre debe tener más de 3 caracteres',
            'name.unique'=>'El nombre ya esta en uso',
            'identificador.required'=>'Debe introducir el identificador',
            'identificador.unique'=>'El identificador ya esta en uso',
            'tipo_unidad_medida_id.required' => 'Debe selccionar el tipo de unidad de medida',
        ];
    }
}
