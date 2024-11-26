<?php

namespace App\Http\Resources;

use App\Models\TipoVeiculo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VeiculoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'matricula' => $this->matricula,
            'cor' => $this->cor,
            'descricao' => $this->descricao,
            'tipo' => new TipoVeiculoResource($this->tipoVeiculo),
        ];
    }
}
