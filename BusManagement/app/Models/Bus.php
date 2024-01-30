<?php

namespace App\Models;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bus extends Model
{
    use SoftDeletes;
    protected $fillable = ['bus_no', 'supervisor_name', 'supervisor_number'];
    public function trip():HasMany{
        return $this->hasMany(Trip::class);
    }
}
