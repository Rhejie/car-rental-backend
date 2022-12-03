<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackerCoordinates extends Model
{
    use HasFactory;

    public function tracker() {
        return $this->belongsTo(Tracker::class, 'tracker_id', 'id');
    }

    public function booking() {
        return $this->belongsTo(Booking::class);
    }
}
