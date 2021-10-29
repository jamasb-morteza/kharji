<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'email' => $this->email,
            'text' => "$this->name",
            'name' => "$this->name",
            'last_name' => "$this->last_name",
            'first_name' => "$this->first_name",
            'avatar' => "$this->avatar",
            'id' => $this->id
        ];
    }
}
