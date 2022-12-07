<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'created_at' =>  'datetime:Y-M-d',
    ];
    protected $with = ['paymentMode'];
    public function paymentMode() {
        return $this->belongsTo(PaymentMode::class);
    }

    public function booking() {
        return $this->belongsTo(Booking::class);
    }
}
