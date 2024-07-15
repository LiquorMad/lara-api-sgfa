<?php

namespace App\Http\Controllers;

use App\Http\Resources\PunicaoCollection;
use App\Models\Punicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PunicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            return new PunicaoCollection(Punicao::all());
            $punicao = Punicao::with('veiculo','user')->get();
            return $punicao;
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
        $validated = $request->validated();
        $punicao = Auth::user()->punicao->create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Punicao $punicao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Punicao $punicao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Punicao $punicao)
    {
        //
    }
}
