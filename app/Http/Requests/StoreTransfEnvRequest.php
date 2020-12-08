<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransfEnvRequest extends FormRequest
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
            'num_fact'=>'required|numeric',
            'origen_id'=>'required',
            'destino_id'=>'required|different:origen_id',
        ];
    }

    public function messages()
    {
        return [
            'num_fact.required'=>'El número de la factura es obligatorio',
            'num_fact.required'=>'El número de la factura no debe contener letras',
            'origen_id.required'=>'El lugar de origen es obligatorio',
            'destino_id.required'=>'El lugar de destino es obligatorio',
            'destino_id.different'=>'El lugar de destino debe ser diferente al de origen',            
        ];
    }
}
