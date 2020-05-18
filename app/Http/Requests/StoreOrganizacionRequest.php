<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrganizacionRequest extends FormRequest
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
            'name'=>
                ['required',
                'min:3',
                Rule::unique('organizaciones')->ignore($this->route('organizacion'))],
            //'identificador'=>'required',
            'municipio_id'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Debe introducir el nombre',
            'name.min'=>'El nombre debe tener mas de 3 caracteres',
            'name.unique'=>'El nombre ya esta en uso',
            'municipio_id.required'=>'Debe seleccionar el municipio',            
        ];
    }
}
