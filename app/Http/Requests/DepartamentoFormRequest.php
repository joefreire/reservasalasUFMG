<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class DepartamentoFormRequest extends FormRequest
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
        if(!empty($this->request->get('_id'))){
            return [
                '_id' => 'required',
                'nome' => 'required',
                'codigo' => 'required',
                'unidade' => 'required',
            ];
        }
        return [
            'nome' => 'required|unique:App\Models\Departamento,nome',
            'codigo' => 'required|unique:App\Models\Departamento,codigo',
            'unidade' => 'required',
        ];
    }
}
