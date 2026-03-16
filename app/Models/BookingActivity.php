<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingActivity extends Model
{

    protected $fillable = [
        'booking_id',
        'activity_id',
        'activity_date',
        'price'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

}