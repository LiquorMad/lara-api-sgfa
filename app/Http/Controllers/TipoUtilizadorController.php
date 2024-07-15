<?php

namespace App\Http\Controllers;

use App\Http\Resources\TipoUtilizadorCollection;
use App\Models\TipoUtilizador;
use Illuminate\Http\Request;

class TipoUtilizadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            //code...
            return new TipoUtilizadorCollection(TipoUtilizador::all());

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
    public function show(TipoUtilizador $tipoUtilizador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoUtilizador $tipoUtilizador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoUtilizador $tipoUtilizador)
    {
        //
    }
}
