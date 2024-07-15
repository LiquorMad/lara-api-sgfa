<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FilaOut extends Model
{
    use HasFactory;
    protected $softDelete = true;
    protected $dates = ['created_at','updated_at','deleted_at'];
    use SoftDeletes;
    protected $table = 'fila_outs';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['idFilaIn'];

    public function filaIn(): BelongsTo
    {
        return $this->belongsTo(FilaIn::class,'idFilaIn');
    }
}
