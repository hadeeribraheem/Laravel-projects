<?php

namespace App\Http\Resources;

use App\Actions\DisplayDataWithCurrentLang;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $arr = [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'year_id' => $this->year_id,
            'user' => UserResource::make($this->whenLoaded('user')), // Load 'user' relation if it's loaded
            'collage_year' => CollageYearResource::make($this->whenLoaded('year')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s') ?? null, // Format the created_at field
        ];

        if (app()->getLocale() == 'all') {
            $arr['name'] = DisplayDataWithCurrentLang::display($this->name);
            $arr['info'] = DisplayDataWithCurrentLang::display($this->info);
        }

        return $arr;
    }
}
