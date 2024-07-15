<?php

namespace App\Http\Controllers;

use App\Http\Resources\FilaInCollection;
use App\Http\Resources\FilaOutCollection;
use App\Models\FilaOut;
use Illuminate\Http\Request;

class FilaOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            return new FilaOutCollection(FilaOut::all());

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
    public function show(FilaOut $filaOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FilaOut $filaOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FilaOut $filaOut)
    {
        //
    }
}
