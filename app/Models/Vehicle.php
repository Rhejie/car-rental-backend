<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'model',
        'tracker_id',
        'color',
        'capacity',
        'plate_number',
        'fuel_capacity',
        'fuel_type',
        'fuel_consumption',
        'odometer',
        'status',
        'publish',
        'cr_no',
        'vehicle_brand_id',
        'fuel_type_id',
        'engine_no',
        'chassis_no',
        'cr_expiration_date',
    ];

    public function tracker() {

        return $this->belongsTo(Tracker::class);

    }

    public function bookings() {
        return $this->hasMany(Booking::class, 'vehicle_id');
    }

    public function color() {
        return $this->belongsTo(Color::class);
    }

    public function fuelType() {
        return $this->belongsTo(FuelType::class);
    }

    public function vehicleImages() {
        return $this->hasMany(VehicleImage::class);
    }

    public function vehicleBrand() {
        return $this->belongsTo(VehicleBrand::class);
    }

    public function vehiclePlace() {
        return $this->hasMany(VehiclePlaces::class, 'vehicle_id',  'id');
    }

    public function maintenance () {
        return $this->hasMany(VehicleMaintenance::class, 'vehicle_id');
    }
}
