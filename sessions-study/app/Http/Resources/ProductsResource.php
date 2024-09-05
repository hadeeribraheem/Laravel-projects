<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
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
            'user_id' => $this->user_id,
            'user_name' => $this->whenLoaded('user', function () {
                return $this->user->name;
            }), // Loading the user's name
            'image' => ImageResource::make($this->whenLoaded('image')), // Load the image relationship
            'name' => $this->name,
            'info' => $this->info,
            'price' => $this->price,
            'created_at' => $this->created_at->format('Y-m-d'),
            //'updated_at' => $this->updated_at->format('Y-m-d'),
        ];
    }
}
