<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traveler extends Model
{
    protected $fillable = [
        'booking_id',
        'name',
        'age',
        'type'
    ];
}