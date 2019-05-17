<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroUsuarios extends FormRequest
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
            
            'nombre' => 'require|max:50',
            'apellido' => 'require|max:50',
            'cedula' => 'require|max:10',
            'email' => 'email|unique:usuarios',
            'password'=> 'require|min:6|max:8'

        ];
    }
}
