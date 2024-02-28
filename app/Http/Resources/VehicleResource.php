<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'type'=>$this->resource->type,
            'company'=>$this->resource->company,
            'organization_id'=>$this->resource->organization_id
        ];
    }
}
