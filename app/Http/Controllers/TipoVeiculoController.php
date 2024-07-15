<?php

namespace App\Http\Controllers;

use App\Http\Resources\TipoVeiculoCollection;
use App\Models\TipoVeiculo;
use Illuminate\Http\Request;

class TipoVeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            //code...
            return new TipoVeiculoCollection(TipoVeiculo::all());
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoVeiculo $tipoVeiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoVeiculo $tipoVeiculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoVeiculo $tipoVeiculo)
    {
        //
    }
}
