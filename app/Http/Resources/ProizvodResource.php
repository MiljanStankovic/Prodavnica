<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProizvodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'ime' => $this->resource->ime, 
            'cena' => $this->resource->cena, 
            'tip' => new TipResource($this->resource->tip),
            'proizvodjac' => new ProizvodjacResource($this->resource->proizvodjac)
        ];
    }
}
