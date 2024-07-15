<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rota extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'rotas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $softDelete = true;
    protected $dates = ['created_at','updated_at','deleted_at'];
    protected $fillable = ['idZona','descricao'];  
    
    public function filaIn(): HasOne
    {
        return $this->hasOne(FilaIn::class,'idRota');
    }
    public function zona(): BelongsTo
    {
        return $this->belongsTo(Zona::class, 'idZona');
    }
}
