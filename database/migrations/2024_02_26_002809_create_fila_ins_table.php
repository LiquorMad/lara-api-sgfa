<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('fila_ins', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('idEstado')->unsigned();
            $table->foreign('idEstado')
            ->references('id')
            ->on('estados')
            ->onDelete('CASCADE');
            $table->bigInteger('idUser')->unsigned();
            $table->foreign('idUser')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE');
            $table->bigInteger('vez')->nullable();
            $table->string('atraso')->nullable();
            $table->bigInteger('idRota')->unsigned();
            $table->foreign('idRota')
                ->references('id')
                ->on('rotas')
                ->onDelete('CASCADE');
            $table->bigInteger('idVeiculo')->unsigned()->unique();
            $table->foreign('idVeiculo')
                ->references('id')
                ->on('veiculos')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fila_ins');
    }
};
