<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PharmacyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'pharmacy_id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'address' => $this->address,
            'email' => $this->email,
            'role' => $this->role,
            'created_at' => $this->createdat
        ];
    }
}
