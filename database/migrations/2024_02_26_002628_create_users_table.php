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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apelido')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('idTipoUser')->unsigned();
            $table->foreign('idTipoUser')
                ->references('id')
                ->on('tipo_utilizadors')
                ->onDelete('CASCADE');
            $table->bigInteger('idZona')->unsigned();
            $table->foreign('idZona')
                ->references('id')
                ->on('zonas')
                ->onDelete('CASCADE');
            $table->bigInteger('idEstado')->unsigned();
            $table->foreign('idEstado')
                ->references('id')
                ->on('estados')
                ->onDelete('CASCADE');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
