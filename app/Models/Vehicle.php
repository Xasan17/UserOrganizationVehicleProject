<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{ public $timestamps=false;
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'company',
        'organization_id'
    ];
    public function fuelsensors(): HasMany
    {
        return $this->hasMany(FuelSensor::class);
    }
}
