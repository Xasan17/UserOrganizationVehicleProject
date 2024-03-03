<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FuelSensorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this -> resource->id,
            'name'=> $this->resource->name,
            'vehicle_id'=>$this->resource->vehicle_id,
            'vehicle'=>$this->whenLoaded('vehicle',function (){
                return $this->resource->vehicle->toArray();
            }),
            ];
    }
}
