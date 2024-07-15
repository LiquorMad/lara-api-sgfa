<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concelho extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $table = 'concelhos';
    protected $primaryKey = 'id';

    protected $fillable = ['nome','idIlha','descricao'];
    protected $softDelete = true;
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function zona(): HasMany
    {
        return $this->hasMany(Zona::class, 'idZona');
    }
    public function ilha(): BelongsTo
    {
        return $this->belongsTo(Ilha::class, 'idIlha');
    }
}
