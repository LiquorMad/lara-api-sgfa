<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Veiculo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'veiculos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $softDelete = true;
    protected $dates = ['created_at','updated_at','deleted_at'];
    
    protected $fillable = ['id','matricula','cor','idTipo'];

    public function punicao(): HasOne
    {
        return $this->hasOne(Punicao::class, 'idVeiculo');
    }
    public function filaIn(): HasOne
    {
        return $this->hasOne(FilaIn::class, 'idVeiculo');
    }
    public function tipoVeiculo(): BelongsTo
    {
        return $this->belongsTo(TipoVeiculo::class, 'idTipo');
    }
    public static function getAllVeiculoRegister(){

        return DB::select("SELECT v.* FROM 
            veiculos as v WHERE deleted_at IS NULL AND v.id 
            NOT IN (SELECT idVeiculo from fila_ins)");
            
        return DB::select("SELECT v.matricula as matricula FROM 
            veiculos as v WHERE deleted_at IS NULL  AND v.matricula 
            NOT IN (SELECT matricula from fila_ins)");
    }
    public static function getAllVeiculoTurn(){
        return DB::select("SELECT v.* FROM 
            veiculos as v WHERE deleted_at IS NULL AND v.id 
            IN (SELECT idVeiculo from fila_ins)");
            
    }
}
