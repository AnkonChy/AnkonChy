<?php

namespace App\Models;
use App\Models\Trip;
use App\Models\User;
use app\models\Locaiton;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeatAllocation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'trip_id', 'trip_from', 'trip_to', 'seat_no', 'fare_per_seat','total_pare'];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function trip():BelongsTo{
        return $this->belongsTo(Trip::class);
    }

    public function tripFrom(): BelongsTo{
        return $this->belongsTo(Location::class, 'trip_from');
    }

    public function tripTo(): BelongsTo{
        return $this->belongsTo(Location::class, 'trip_to');
    }
}
