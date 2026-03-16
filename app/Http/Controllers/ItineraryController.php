<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{
    public function getItinerary($packageId)
    {

        $itinerary = Itinerary::with([
            'city',
            'activities',
            'hotel'
        ])->where('package_id', $packageId)->get();

        return response()->json($itinerary);
    }
}
