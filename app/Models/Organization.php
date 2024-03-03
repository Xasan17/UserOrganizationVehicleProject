<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property User[] $users
 */
/**
 * @property string $name
 */
class Organization extends Model
{
    protected $fillable = [
        'name'
    ];
    protected $hidden = [
        'password',
        'remember_token',];
    use HasFactory;
    public function users(): BelongsToMany
    {
return $this->belongsToMany(User::class);
    }
    public function vehicles(): hasMany
    {
        return $this->hasMany(Vehicle::class,'organization_id','id');
    }
}
