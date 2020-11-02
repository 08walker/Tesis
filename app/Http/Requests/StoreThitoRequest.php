<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreThitoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
                      Rule::unique('tipo_hipo')->ignore($this->route('tipoHito'))],
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
