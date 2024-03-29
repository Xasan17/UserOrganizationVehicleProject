<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelSensor extends Model
{public $timestamps=false;
    use HasFactory;
    protected $fillable = [
        'name',
        'vehicle_id'
    ];
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class,'vehicle_id','id');
    }
}
