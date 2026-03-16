<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traveler;

class TravelerController extends Controller
{

    public function addTraveler(Request $request)
    {

        $traveler = Traveler::create([
            'booking_id'=>$request->booking_id,
            'name'=>$request->name,
            'age'=>$request->age,
            'type'=>$request->type
        ]);

        return response()->json([
            "message"=>"Traveler Added",
            "data"=>$traveler
        ]);

    }

}