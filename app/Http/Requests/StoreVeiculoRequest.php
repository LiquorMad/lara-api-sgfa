<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVeiculoRequest extends FormRequest
{
    /**
     * Determine se o usuário está autorizado a fazer esta solicitação.
     *
     * @return bool
     */
    public function authorize()
    {
        // Se você precisar de alguma lógica de autorização personalizada, adicione aqui.
        // Por exemplo, retornar true se todos puderem fazer essa solicitação
        return true;
    }

    /**
     * Obtenha as regras de validação que se aplicam à solicitação.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idTipo' => 'required|exists:tipo_veiculos,id', // Verifica se o tipo de veículo existe
            'matricula' => 'required|unique:veiculos,matricula|regex:/(^([a-zA-Z]{2})(-)(\d+){2}(-)([a-zA-Z]{2}))/u', // Valida a matrícula
            'cor' => 'nullable|string',
        ];
    }

    /**
     * Obtenha as mensagens de erro personalizadas.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'matricula.unique' => 'Veículo já registrado',
            'matricula.regex' => 'Formato de matrícula inválido',
            'matricula.required' => 'O campo matrícula é obrigatório',
            'idTipo.required' => 'O campo Tipo é obrigatório',
        ];
    }
}
