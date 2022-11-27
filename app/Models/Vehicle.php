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
    ];

    public function tracker() {

        return $this->belongsTo(Tracker::class);

    }

    public function color() {
        return $this->belongsTo(Color::class);
    }
}
