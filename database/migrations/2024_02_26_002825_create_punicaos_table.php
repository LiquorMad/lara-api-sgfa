<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('punicaos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('dias');
            $table->timestamp('end_at');
            $table->bigInteger('idVeiculo')->unsigned();
            $table->foreign('idVeiculo')
                ->references('id')
                ->on('veiculos')
                ->onDelete('CASCADE');
            $table->bigInteger('idUser')->unsigned();
            $table->foreign('idUser')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('punicaos');
    }
};
