<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class HotelController extends Controller
{

    public function index()
    {
        return Hotel::with('city')->get();
    }

    public function store(Request $request)
    {
        $hotel = Hotel::create($request->all());

        return response()->json([
            "message" => "Hotel created",
            "data" => $hotel
        ]);
    }

    public function show($id)
    {
        return Hotel::find($id);
    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::find($id);
        $hotel->update($request->all());

        return response()->json([
            "message" => "Hotel updated"
        ]);
    }

    public function destroy($id)
    {
        Hotel::destroy($id);

        return response()->json([
            "message" => "Hotel deleted"
        ]);
    }
    // Recommended Hotel Logic
    public function recommendedHotel($cityId)
    {

        $hotel = Hotel::where('city_id', $cityId)
            ->orderBy('popularity', 'DESC')
            ->first();

        return response()->json($hotel);
    }

    // Change Hotel API
    public function getCityHotels($cityId)
    {

        $hotels = Hotel::where('city_id',$cityId)
        ->orderBy('rating','DESC')
        ->get();

        return response()->json($hotels);

    }
    public function searchHotels(Request $request)
{

    $cityId = $request->city_id;

    $hotels = Hotel::where('city_id',$cityId)
    ->orderBy('rating','DESC')
    ->get();

    return response()->json([
        "status"=>true,
        "data"=>$hotels
    ]);

}


public function checkAvailability(Request $request)
{

$response = Http::get('https://api.hotelprovider.com/availability',[

    'hotel_id'=>$request->hotel_id,
    'checkin'=>$request->checkin,
    'checkout'=>$request->checkout

]);

return $response->json();

}
public function selectHotel(Request $request)
{

BookingHotel::create([

    'booking_id'=>$request->booking_id,
    'hotel_id'=>$request->hotel_id,
    'checkin'=>$request->checkin,
    'checkout'=>$request->checkout,
    'price'=>$request->price

]);

return response()->json([
    "message"=>"Hotel Selected"
]);

}
}
