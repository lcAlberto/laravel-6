<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FarmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cep' => $this->cep,
            'city' => $this->city,
            'state' => $this->state,
            'created_at' => format_date($this->created_at, 'd/m/Y'),

            'links' => [
                'edit' => $this->when(true, route('admin.farm.edit', $this->id)),
                'show' => $this->when(true, route('admin.farm.show', $this->id)),
                'destroy' => $this->when(true, route('admin.farm.destroy', $this->id)),
            ],
        ];
    }
}
