<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $fillable = [
        'package_id',
        'agent_id',
        'travel_date',
        'total_price',
        'payment_status'
    ];

    public function travelers()
    {
        return $this->hasMany(Traveler::class);
    }

    public function hotels()
    {
        return $this->hasMany(BookingHotel::class);
    }

    public function activities()
    {
        return $this->hasMany(BookingActivity::class);
    }

}