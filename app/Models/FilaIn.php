<?php

namespace App\Models;

use App\Models\Scopes\FilaInScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class FilaIn extends Model
{
    use HasFactory;
    protected $table = 'fila_ins';
    protected $primaryKey = 'id';
    public $timestamps = false;
    private $firts=1;
    protected $softDelete = true;
    protected $dates = ['created_at','updated_at','deleted_at'];
    use SoftDeletes;
    protected $fillable = ['idUser','idVeiculo','vez','idRota','atraso','idEstado'];

    public function rota(): BelongsTo
    {
        return $this->belongsTo(Rota::class,'idRota');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'idUser');
    }
    public function veiculo(): BelongsTo
    {
        return $this->belongsTo(Veiculo::class,'idVeiculo');
    }

    public static function getDestinoByMatricula($matricula){
        return DB::select('SELECT z.nome AS destino FROM zonas AS z, 
        rotas AS r, veiculos as v,
        fila_ins as f WHERE z.id=r.idZona AND f.idVeiculo=v.id 
        AND v.matricula=? 
        AND r.id=f.idRota',[$matricula] )[0]->destino;
    }

}
