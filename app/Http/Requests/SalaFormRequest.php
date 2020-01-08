<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaFormRequest extends FormRequest
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
                '_id' => 'required',
                'nome' => 'required',
                'departamentos' => 'required',
                'capacidade' => 'required|integer',
                'tipo_quadro' => 'required',
                'tipo_assento' => 'required',
            ];
        }
        return [
            'nome' => 'required|unique:App\Models\Sala,nome, departamento',
            'departamentos' => 'required|exists:App\Models\Departamento,_id',
            'capacidade' => 'required|integer',
            'tipo_quadro' => 'required',
            'tipo_assento' => 'required',
        ];
    }
}
