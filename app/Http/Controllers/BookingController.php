<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{

    public function createBooking(Request $request)
    {

        $booking = Booking::create([
            'package_id' => $request->package_id,
            'agent_id' => $request->agent_id,
            'travel_date' => $request->travel_date,
            'total_price' => $request->total_price,
            'payment_status' => 'pending'
        ]);

        return response()->json([
            "message" => "Booking Created",
            "booking" => $booking
        ]);
    }

    public function paymentSuccess(Request $request)
    {

        $booking = Booking::find($request->booking_id);

        $booking->payment_status = "paid";

        $booking->save();

        return response()->json([
            "message" => "Payment successful"
        ]);
    }
    public function modifyBooking($id)
    {

        $booking = Booking::find($id);

        $days = now()->diffInDays($booking->travel_date);

        if ($days < 7) {

            return response()->json([
                "message" => "Booking cannot be modified"
            ]);
        }

        return response()->json([
            "message" => "Booking editable"
        ]);
    }
    public function selectHotel(Request $request)
    {

        BookingHotel::create([

            'booking_id' => $request->booking_id,
            'hotel_id' => $request->hotel_id,
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'price' => $request->price

        ]);

        return response()->json([
            "message" => "Hotel Selected"
        ]);
    }
    public function addActivity(Request $request)
    {

        BookingActivity::create([

            'booking_id' => $request->booking_id,
            'activity_id' => $request->activity_id,
            'activity_date' => $request->date,
            'price' => $request->price

        ]);

        return response()->json([
            "message" => "Activity Added"
        ]);
    }
    public function removeActivity($id)
    {

        BookingActivity::destroy($id);

        return response()->json([
            "message" => "Activity Removed"
        ]);
    }
    public function bookingSummary($bookingId)
    {

        $booking = Booking::with([
            'travelers',
            'hotels',
            'activities'
        ])->find($bookingId);

        return response()->json($booking);
    }
    public function cancelBooking($id)
    {

        $booking = Booking::find($id);

        $booking->booking_status = "cancelled";

        $booking->save();

        return response()->json([
            "message" => "Booking Cancelled"
        ]);
    }
}
