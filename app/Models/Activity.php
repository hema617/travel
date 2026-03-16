<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'city_id',
        'activity_name',
        'duration_hours',
        'price'
    ];
    public function bookings()
{
    return $this->hasMany(BookingActivity::class);
}
}