<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method unique(string[] $array)
 */
class OrganizationUser extends Model
{public $timestamps=false;
    use HasFactory;
}
