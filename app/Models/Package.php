<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'package_name',
        'description',
        'total_days',
        'base_price'
    ];

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class);
    }
}