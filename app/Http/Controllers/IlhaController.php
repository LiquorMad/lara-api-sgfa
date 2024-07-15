<?php

namespace App\Http\Controllers;

use App\Http\Resources\IlhaCollection;
use App\Http\Resources\IlhaResource;
use App\Models\Ilha;
use Illuminate\Http\Request;

class IlhaController extends Controller
{
    public function index()
    {
        //
        try {
            return new IlhaCollection(Ilha::all());
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ilha $ilha)
    {
        //
        return new IlhaResource(Ilha::findOrFail($ilha->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ilha $ilha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ilha $ilha)
    {
        //
    }
}
