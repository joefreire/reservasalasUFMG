<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class DisciplinaFormRequest extends FormRequest
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
                'tipo' => 'required',
                'usuario_responsavel' => 'required',
            ];
        }
        return [
            'tipo' => 'required',
            'usuario_responsavel' => 'required',
            'data_reserva' => 'required',
        ];
    }
}
