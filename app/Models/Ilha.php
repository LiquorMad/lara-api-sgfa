<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ilha extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $table = 'ilhas';
    protected $primaryKey = 'id';

    protected $fillable = ['nome','sigla'];
    protected $softDelete = true;
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function concelho(): HasOne
    {
        return $this->hasOne(Concelho::class,'idIlha');
    }
}
