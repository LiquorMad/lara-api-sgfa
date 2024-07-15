<?php

namespace App\Http\Controllers;

use App\Http\Resources\RotaCollection;
use App\Http\Resources\RotaResource;
use App\Models\Rota;
use Illuminate\Http\Request;

class RotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            return new RotaCollection(Rota::all());
            
            //code...
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
    public function show(Rota $rota)
    {
        //
        return new RotaResource($rota);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rota $rota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rota $rota)
    {
        //
    }
}
