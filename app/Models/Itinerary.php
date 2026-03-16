<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $fillable = [
        'package_id',
        'city_id',
        'day_number',
        'hotel_id'
    ];

    public function activities()
    {
        return $this->belongsToMany(Activity::class,'itinerary_activities');
    }
}