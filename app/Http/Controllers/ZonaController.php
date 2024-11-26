<?php

namespace App\Http\Controllers;

use App\Http\Resources\ZonaCollection;
use App\Models\Concelho;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        try {
            //code...
            $zonas = Zona::select('zonas.nome as zona','concelhos.nome as concelho')
                ->join('concelhos', 'zonas.idConcelho', '=', 'concelhos.id')
                ->get();

            $concelhos = Concelho::all();
            $data = [
                'concelhos' => $concelhos,
                'zonas' => $zonas,
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
            'idConcelho' => 'required|exists:concelhos,id', // Verifica se o tipo de veículo existe
            'nome' => 'required|unique:zonas,nome|required'
        ], [
            // Mensagens de erro personalizadas
            'nome.unique' => 'Zona já registrado',
            'nome.required' => 'O campo Nome é obrigatorio',
            'idConcelho.required' => 'O campo Concelho é obrigatorio',
        ]);
        // Se a validação falhar, Laravel automaticamente retorna uma resposta 422 com os erros
        $zona = Zona::create($validated);
        return response()->json($zona, 201); // Retorna o veículo criado com status 201 (Created)
    } catch (ValidationException $e) {
        // Caso a validação falhe, retorna os erros de validação de forma mais personalizada
        return response()->json([
            'message' => 'Erros no registo',
            'error' => $e->getMessage(), // Aqui é onde você acessa o método errors() da exceção
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
    public function show(Zona $zona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zona $zona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zona $zona)
    {
        //
    }
}
