<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Overcharge extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = ['overchargeType'];
    protected $fillable = [
        'booking_id',
        'charge',
        'overcharge_type_id'
    ];
    public function overchargeType() {
        return $this->belongsTo(OverchargeType::class);
    }

    public function booking() {
        return $this->belongsTo(Booking::class);
    }
}
