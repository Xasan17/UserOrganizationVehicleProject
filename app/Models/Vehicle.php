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
    public function organization()
    {
      return $this->belongsTo(Organization::class,'organization_id','id');
    }
    public function fuelSensors(): HasMany
    {
        return $this->hasMany(FuelSensor::class,'vehicle_id','id');
    }
}
