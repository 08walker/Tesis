<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $rules=[
            'name'=> 'required',
            'email'=> [
                'required', 
                Rule::unique('users')->ignore($this->route('user')->id)
            ]
        ];
        
        if ($this->filled('password')) {
            $rules['password']=['confirmed','min:6'];
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required'=>'Debe introducir el nombre',
            'password.min'=>'La contraseña debe tener mas de 6 caracteres',
            'password.confirmed'=>'Las contraseñas no coinciden',
            'email.unique'=>'El correo electronico ya está en uso',
        ];
    }
}
