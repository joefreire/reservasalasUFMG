<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
        if(!empty($request->_id)){
            return [
                'nome' => 'required',
                'login' => 'required|unique:App\Models\User,login',
                'email' => 'required|unique:App\Models\User,email',
                'tipo' => 'required',
            ];
        }
        return [
            'nome' => 'required',
            'login' => 'required|unique:App\Models\User,login',
            'email' => 'required|unique:App\Models\User,email',
            'tipo' => 'required',
        ];
    }
}
