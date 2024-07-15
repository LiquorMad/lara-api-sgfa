<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zona extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'zonas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $softDelete = true;
    protected $dates = ['created_at','updated_at','deleted_at'];
    protected $fillable = ['nome','idConcelho'];

    /*
    public function funcionario(): HasMany
    {
        return $this->hasMany(Funcionario::class, 'idZona','idZona');
    }
    */

    public function rota(): HasOne
    {
        return $this->hasOne(Rota::class, 'idDestino');
    }
    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'idZona');
    }
    
    public function concelho(): BelongsTo
    {
        return $this->belongsTo(Concelho::class,'idConcelho','id');
    }
}
