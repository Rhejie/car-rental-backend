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
    ];

    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }

    public function vehiclePlace() {
        return $this->belongsTo(VehiclePlaces::class, 'vehicle_place_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
