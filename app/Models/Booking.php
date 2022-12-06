<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'created_at' =>  'datetime:Y-M-d',
        'booking_start' =>  'datetime:Y-M-d h:m a',
        'booking_end' =>  'datetime:Y-M-d h:m a',
    ];

    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }

    public function driver() {
        return $this->belongsTo(Driver::class);
    }

}
