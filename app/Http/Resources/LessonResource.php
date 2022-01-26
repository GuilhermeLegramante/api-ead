<?php

namespace App\Http\Resources;

use App\Http\Resources\ViewResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
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
            'name' => ucwords(strtolower($this->name)),
            'description' => $this->description,
            'video' => $this->video,
            'views' => ViewResource::collection($this->whenLoaded('views')),
        ];
    }
}
