<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'city_name',
        'country',
        'is_major_city'
    ];

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}