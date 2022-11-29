<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehiclePlaces extends Model
{
    use HasFactory, SoftDeletes;

    public function place() {
        return $this->belongsTo(Places::class, 'place_id');
    }
}
