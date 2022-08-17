<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArtistResource extends JsonResource
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
            'id' => $this->id,
            'artist_name' => $this->artist_name,
            'artist_avatar' => $this->artist_avatar,
            'artist_profession' => $this->artist_profession,
            'artist_description' => $this->artist_description,
            'created_at' => $this->created_at,
        ];
    }
}
