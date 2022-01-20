<?php

namespace App\Http\Resources;

use Illuminate\Support\Carbon;
use App\Http\Resources\UserResource;
use App\Http\Resources\LessonResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ReplySupportResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportResource extends JsonResource
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
            'status' => $this->status,
            'status_label' => $this->statusOptions[$this->status],
            'description' => $this->description,
            'user' => new UserResource($this->user),
            'lesson' => new LessonResource($this->lesson),
            'replies' => ReplySupportResource::collection($this->replies),
            'dt_updated' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
