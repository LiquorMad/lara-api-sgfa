<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $ilhas = [
            ['nome' => 'Santiago','Sigla' => 'ST'],
            ['nome' => 'Maio','Sigla' => 'Maio'],
            ['nome' => 'Fogo','Sigla' => 'FG'],
            ['nome' => 'Brava','Sigla' => 'BRV'],
            ['nome' => 'Santo Antao','Sigla' => 'STA'],
            ['nome' => 'Sao Nicolau','Sigla' => 'SN'],
            ['nome' => 'Sao Vicente','Sigla' => 'SV'],
            ['nome' => 'Sal','Sigla' => 'SL'],
            ['nome' => 'Boa Vista','Sigla' => 'BV'],
        ];
        DB::table('ilhas')->insert($ilhas);
        $concelhos = [
            ['nome' => 'Santa Catarina','idIlha' => 1],
        ];
        DB::table('concelhos')->insert($concelhos);

        $zonas = [
            ['id'=>1,'nome' => 'Fundura','idConcelho' => 1],
        ];
        DB::table('zonas')->insert($zonas);
        $tipo_utilizador = [
            ['id' =>1,'tipo' => 'Administrador','descricao' => 'Responsavel da fila de Automoveis'],
            ['id' =>2,'tipo' => 'Fiscal de Terminal','descricao' => 'Fiscal que fica no terminal para controlar a fila'],
            ['id' =>3,'tipo' => 'Fiscal de Estrada','descricao' => 'Fiscal que ficam nas estradas par controlar os veiculos que passam'],
        ];
        DB::table('tipo_utilizadors')->insert($tipo_utilizador);
        $estados = [
            ['id' =>1,'estado' => 'ativo'],
            ['id' =>2,'estado' => 'inativo'],
        ];
        DB::table('estados')->insert($estados);
        DB::table('users')->insert([
            'name' => 'Leonildo',
            'email' => 'leonildo@gmail.com',
            'password' => Hash::make('password'),
            'idTipoUser' => 1,
            'idZona' => 1,
            'idEstado' => 1,
        ]);
         // Query Builder approach

         $rota = [
            ['id'=>1,'idZona' => 1],
        ];
        DB::table('rotas')->insert($rota);

        $tipo_veiculo = [
            ['id' =>1,'tipo' => 'Hiace',],
            ['id' =>2,'tipo' => 'Hilux',],
            ['id' =>3,'tipo' => 'Dyna',],
        ];
        DB::table('tipo_veiculos')->insert($tipo_veiculo);

        $veiculo = [
            ['id' =>1,'matricula'=>'ST-99-JP','idTipo' =>1],
            ['id' =>2,'matricula'=>'ST-75-GT','idTipo' =>1],
            ['id' =>3,'matricula'=>'ST-70-FA','idTipo' =>1],
            ['id' =>4,'matricula'=>'ST-15-IE','idTipo' =>1],
            ['id' =>5,'matricula'=>'ST-54-GS','idTipo' =>1],
            ['id' =>6,'matricula'=>'ST-40-GU','idTipo' =>1],
            ['id' =>7,'matricula'=>'ST-53-GG','idTipo' =>1],
            ['id' =>8,'matricula'=>'ST-30-PP','idTipo' =>1],
            ['id' =>9,'matricula'=>'ST-90-KL','idTipo' =>1],
            ['id' =>10,'matricula'=>'ST-42-GU','idTipo' =>1],
            ['id' =>11,'matricula'=>'ST-43-GG','idTipo' =>1],
            ['id' =>12,'matricula'=>'ST-44-PP','idTipo' =>1],
            ['id' =>13,'matricula'=>'ST-79-KL','idTipo' =>1],


        ];
        DB::table('veiculos')->insert($veiculo);

        $fila_in = [
            ['id' =>1,'idRota'=>1,'idEstado'=>1,'idUser'=>1,'idVeiculo'=>1,'vez'=>1],
            ['id' =>2,'idRota'=>1,'idEstado'=>1,'idUser'=>1,'idVeiculo'=>2,'vez'=>2],
            ['id' =>3,'idRota'=>1,'idEstado'=>1,'idUser'=>1,'idVeiculo'=>3,'vez'=>3],
            ['id' =>4,'idRota'=>1,'idEstado'=>1,'idUser'=>1,'idVeiculo'=>4,'vez'=>4],
            ['id' =>5,'idRota'=>1,'idEstado'=>1,'idUser'=>1,'idVeiculo'=>5,'vez'=>5],
            ['id' =>6,'idRota'=>1,'idEstado'=>1,'idUser'=>1,'idVeiculo'=>6,'vez'=>6],
            ['id' =>7,'idRota'=>1,'idEstado'=>1,'idUser'=>1,'idVeiculo'=>7,'vez'=>7],
            ['id' =>8,'idRota'=>1,'idEstado'=>1,'idUser'=>1,'idVeiculo'=>8,'vez'=>8],
            ['id' =>9,'idRota'=>1,'idEstado'=>1,'idUser'=>1,'idVeiculo'=>9,'vez'=>9],
            ['id' =>10,'idRota'=>1,'idEstado'=>1,'idUser'=>1,'idVeiculo'=>10,'vez'=>6],
            ['id' =>11,'idRota'=>1,'idEstado'=>1,'idUser'=>1,'idVeiculo'=>11,'vez'=>7],
            ['id' =>12,'idRota'=>1,'idEstado'=>1,'idUser'=>1,'idVeiculo'=>12,'vez'=>8],
            ['id' =>13,'idRota'=>1,'idEstado'=>1,'idUser'=>1,'idVeiculo'=>13,'vez'=>9],


        ];
        DB::table('fila_ins')->insert($fila_in);

        $fila_out = [
            ['id' =>1,'idFilaIn'=>1],
        ];
        DB::table('fila_outs')->insert($fila_out);
        $formattedTimestamp = now()->format('Y-m-d H:i:s');
        $punicao = [
            ['id' =>1,'idVeiculo'=>1,'idUser'=>1,'dias'=>2,'end_at'=>$formattedTimestamp],

        ];
        DB::table('punicaos')->insert($punicao);
    }
}
