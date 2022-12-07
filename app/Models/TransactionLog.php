<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'created_at' =>  'datetime:Y-M-d',
    ];

    public function transactionable(){
        return $this->morphTo();
    }

}
