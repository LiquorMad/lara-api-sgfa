<?php

namespace App\Http\Resources;

use App\Models\FilaIn;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilaOutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'filaIn' => new FilaInResource($this->filaIn),
            //'current_rota_nome' => $current_rota_nome,
            'created_at' => $this->created_at,
            //'result' => $result,
    ];
    }
}
