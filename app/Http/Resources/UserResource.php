<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
   
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'apelido'    => $this->apelido,
            'email'      => $this->email,
            'morada'     => new ZonaResource($this->morada),
            'tipo'       => new TipoUtilizadorResource($this->tipo),
            'estado'     => new EstadoResource($this->estado),
            //'current_rota_nome' => $current_rota_nome,
            'created_at' => $this->created_at,
            //'result' => $result,
        ];
    }
}
