<?php

namespace App\Http\Controllers;

use App\Http\Resources\FilaInCollection;
use App\Models\FilaIn;
use App\Models\Rota;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilaInController extends Controller
{
    public function __construct(){
        $this->authorizeResource(FilaIn::class,'fila_in');
    }

    public function index()
    {
        /**
         * From FilaIn with to send api: 
         * All rotas with zona name, to change when is needed,
         * All veiculo with matricula, to change when is needed,
         * All veiculo with matricula in filaIn by rota
         * Current rota with zona name
         */
        try {
            
            //return new FilaInCollection(FilaIn::all());

            $rota = Rota::with('zona')
                ->get()
                ->pluck('zona.nome');

            $rota = Rota::select('rotas.id','zonas.nome')
                ->join('zonas', 'rotas.id', '=', 'zonas.id')
                ->get();
            //Catch all veiculo that is not in FilaIn
            $veiculosRegister   = Veiculo::getAllVeiculoRegister();
            $veiculosTurn       = Veiculo::getAllVeiculoTurn();
            $current_rota       = Rota::with('zona')->first()->zona;
            $current_rota_id    = $current_rota->id;
            $current_rota_nome  = $current_rota->nome;

            $result = FilaIn::select('fila_ins.id','fila_ins.vez','veiculos.matricula','veiculos.cor', 'fila_ins.created_at','users.id as creator')
                ->join('veiculos', 'fila_ins.idVeiculo', '=', 'veiculos.id')
                ->join('users', 'fila_ins.idUser', '=', 'users.id')
                ->join('rotas', 'fila_ins.idRota', '=', 'rotas.id')
                ->where('rotas.id', '=', $current_rota_id)
                ->get();

            $data = [
                'rotas' => $rota,
                'veiculosRegister' => $veiculosRegister,
                'veiculosTurn' => $veiculosTurn,
                'current_rota_nome' => $current_rota_nome,
                'fila' => $result,
            ];
            return response()->json($data);
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
        $idRota = $request->idRota;
        $idVeiculo = $request->idVeiculo;
        $idUser = Auth::user()->id;
        //Control turns, if filaIn is empty, turn start in 1, else turn is the last +1
        if(FilaIn::all()->isEmpty()){
            $vez = 1;
        }else{
            $lastVez = FilaIn::all()->last()->vez;
        $vez = $lastVez + 1;
        }
        $filaIn = FilaIn::create([
            'idRota'=>$idRota, 
            'idVeiculo'=>$idVeiculo, 
            'idUser'=>$idUser,
            'idEstado' => 1,
            'atraso' => 0,
            'vez' => $vez,
        ]);

        return $filaIn;
    }

    /**
     * Display the specified resource.
     */
    public function show(FilaIn $filaIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FilaIn $filaIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FilaIn $filaIn)
    {
        //
    }
    public function myTurn( $matricula){
        try {
            //code...
            $destiny = FilaIn::getDestinoByMatricula($matricula);
            $description = Veiculo::where('matricula', $matricula)->first()->descricao;
            $averageTime = 6;
            $myTurn = FilaIn::whereHas('veiculo', function ($query) use ($matricula) {
                $query->where('matricula', $matricula);
            })->value('vez');

            $data = [
                'destiny' => $destiny,
                'description' => $description,
                'myTurn' => $myTurn,
                'averageTime' => $averageTime,
            ];
            return $data;

        } catch (\Throwable $th) {
            //throw $th;
        }
       
    }
}
