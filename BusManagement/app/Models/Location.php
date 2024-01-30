<?php

namespace App\Models;

use App\Models\Trip;
use App\Models\SeatAllocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['place_name', 'distance_km', 'stopage_order'];

    public function trip(): HasMany{
        return $this->hasMany(Trip::class);
    }

    public function seat(): HasMany{
        return $this->hasMany(SeatAllocation::class);
    }
}
