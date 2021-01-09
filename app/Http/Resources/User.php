<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => format_date($this->created_at, 'd/m/Y'),

            'links' => [
                'edit' => $this->when(true, route('admin.user.edit', $this->id)),
                'show' => $this->when(true, route('admin.user.show', $this->id)),
                'destroy' => $this->when(true, route('admin.user.destroy', $this->id)),
            ],
        ];
    }
}