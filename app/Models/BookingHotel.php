<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingHotel extends Model
{

    protected $fillable = [
        'booking_id',
        'hotel_id',
        'checkin',
        'checkout',
        'price'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

}