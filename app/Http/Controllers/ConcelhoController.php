<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConcelhoCollection;
use App\Http\Resources\ConcelhoResource;
use App\Models\Concelho;
use Illuminate\Http\Request;

class ConcelhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            //code...
            //$concelho = Concelho::with('ilha')->get();
            return new ConcelhoCollection(Concelho::all());

            //return response()->json($concelho);
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
    public function show(Concelho $concelho)
    {
        //
        $concelho = Concelho::with('ilha')->find($concelho->id);
            return response()->json($concelho);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Concelho $concelho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Concelho $concelho)
    {
        //
    }
}
