<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListingResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        return [
            'type' => 'listings',
            'id' => (string) $this->id,
            'attributes' => [
                'title' => $this->title,
                'area' => $this->area,
                'price' => $this->price,
                'photo' => $this->photo,
                'country' => $this->country,
                'city' => $this->city,
                'postal' => $this->postal,
                'address' => $this->address,
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'lat' => $this->lat,
                'lng' => $this->lng,
            ],
            'links' => [
                'self' => route('show_listing', ['id' => $this->id]),
            ],
        ];
    }

}
