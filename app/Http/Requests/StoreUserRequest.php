<?php

namespace App\Http\Requests;

use ErrorException;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','min:2','max:10'],
            'apelido'=>['required','min:2','max:10'],
            'email' => ['email','unique:users'],
            'password' => ['required','min:8','max:20','confirmed'],
        ];
    }

    public function messages(){
        return [
            'email.email' => 'O email tem de ser válido',
            'email.unique' => 'O email tem de ser unico',

            //-----------------------------------------------------------------
            'name.required' => 'O  nome é de preenchimento obrigatório',
            'name.min'=>'O nome tem de ter no mínimo :min  caracter',
            'name.max'=>'O nome tem de ter no máximo :max  caracter',
            //-----------------------------------------------------------------
            'apelido.required' => 'O  apelido é de preenchimento obrigatório',
            'apelido.min'=>'O apelido tem de ter no mínimo :min  caracter',
            'apelido.max'=>'O apelido tem de ter no máximo :max  caracter',
            //-----------------------------------------------------------------
            'password.required'=> 'A senha é obrigatório ',
            'password.min'=>'A senha tem de ter no mínimo :min  caracter',
            'password.max' => ' A senha tem de ter no máximo :max caracter',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors(); // Here is your array of errors
        throw new Exception($errors);
    }
}
