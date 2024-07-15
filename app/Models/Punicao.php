<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Punicao extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'punicaos';
    protected $primaryKey = 'idPunicao';
    public $timestamps = false;
    protected $softDelete = true;
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $fillable = ['idPunicao','dias','idVeiculo','idUser','descricao'];
                            
    public function veiculo(): BelongsTo
    {
        return $this->belongsTo(Veiculo::class, 'idVeiculo');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
