<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilaInResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                'rotas' => new RotaResource($this->rota),
                'veiculos' => new VeiculoResource($this->veiculo),
                'users' => new UserResource($this->user),
                //'current_rota_nome' => $current_rota_nome,
                'data' => $this->created_at,
                //'result' => $result,
        ];
    }
}
