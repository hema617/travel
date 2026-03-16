<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'city_id',
        'hotel_name',
        'api_hotel_id',
        'address',
        'rating',
        'popularity'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function bookings()
{
    return $this->hasMany(BookingHotel::class);
}
}