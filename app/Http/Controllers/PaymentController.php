<?php

namespace App\Http\Controllers;

use Razorpay\Api\Api;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function createOrder(Request $request)
    {

        $api = new Api(env('RAZORPAY_KEY'),env('RAZORPAY_SECRET'));

        $order = $api->order->create([
            'receipt' => rand(),
            'amount' => $request->amount * 100,
            'currency' => 'INR'
        ]);

        return response()->json($order);

    }

  
}