<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tracker extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'name'
    ];

    protected $appends = [
        'status',
    ];

    public function company() {

        return $this->belongsTo(Company::class);

    }

    public function vehicle() {

        return $this->belongsTo(Vehicle::class, 'tracker_id');

    }

    protected function getStatusAttribute()
    {
        return $this->vehicle() ? 'used' : 'unused';
    }

    public function trackerCoordinates() {

        return $this->hasMany(TrackerCoordinates::class);

    }

    public function booking() {
        return $this->hasMany(Booking::class);
    }
}
