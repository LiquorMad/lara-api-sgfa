<?php

namespace App\Http\Controllers;

use App\Http\Resources\VeiculoCollection;
use App\Models\TipoVeiculo;
use App\Models\Veiculo;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            //code...

            $tiposVeiculo = TipoVeiculo::all();
            $veiculos = Veiculo::select('veiculos.matricula','veiculos.cor','tipo_veiculos.tipo')
                ->join('tipo_veiculos', 'veiculos.idTipo', '=', 'tipo_veiculos.id')
                ->get();
            $data = [
                'veiculos' => $veiculos,
                'tiposVeiculo' => $tiposVeiculo,
            ];
            return $data;
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    try {
        // Validação dos dados de entrada
        $validated = $request->validate([
            'idTipo' => 'required|exists:tipo_veiculos,id', // Verifica se o tipo de veículo existe
            'matricula' => 'required|unique:veiculos,matricula|required|regex:/(^([a-zA-z]{2})(-)(\d+){2}(-)([a-zA-z]{2}))/u', // Valida se a matrícula já está registrada
            'cor' => 'nullable|string',
        ], [
            // Mensagens de erro personalizadas
            'matricula.unique' => 'Veículo já registrado',
            'matricula.regex' => 'Formato de matricula é invalido',
            'matricula.required' => 'O campo matricula é obrigatorio',
            'idTipo.required' => 'O campo Tipo é obrigattorio',
            // Mensagem personalizada para a matrícula
        ]);
        // Se a validação falhar, Laravel automaticamente retorna uma resposta 422 com os erros
        $veiculo = Veiculo::create($validated);
        return response()->json($veiculo, 201); // Retorna o veículo criado com status 201 (Created)
    } catch (ValidationException $e) {
        // Caso a validação falhe, retorna os erros de validação de forma mais personalizada
        return response()->json([
            'message' => 'Erro no registo',
            'errors' => $e->errors(), // Aqui é onde você acessa o método errors() da exceção
            'status' => 400
        ], 400);
    } catch (\Throwable $th) {
        // Caso ocorra outro erro inesperado
        return response()->json([
            'message' => 'Ocorreu um erro inesperado',
            'error' => $th->getMessage(), // Detalha a exceção para diagnóstico
            'status' => 500
        ], 500);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Veiculo $veiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Veiculo $veiculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veiculo $veiculo)
    {
        //
        $veiculo->delete();
        return response()->noContent();
    }
}
