<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TravelerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
Route::resource('cities', CityController::class);
Route::resource('hotels', HotelController::class);
Route::resource('packages', PackageController::class);

Route::get('activities', [ActivityController::class,'index']);
Route::post('activities', [ActivityController::class,'store']);
Route::get('activity/city/{city}', [ActivityController::class,'getByCity']);
Route::post('/booking/create',[BookingController::class,'createBooking']);

Route::post('/traveler/add',[TravelerController::class,'addTraveler']);

Route::post('/payment/order',[PaymentController::class,'createOrder']);

Route::post('/payment/success',[PaymentController::class,'paymentSuccess']);

Route::get('/hotel/search',[HotelController::class,'searchHotels']);

Route::get('/hotel/availability',[HotelController::class,'checkAvailability']);

Route::post('/booking/create',[BookingController::class,'createBooking']);

Route::post('/booking/select-hotel',[BookingController::class,'selectHotel']);

Route::post('/booking/add-activity',[BookingController::class,'addActivity']);

Route::delete('/booking/remove-activity/{id}',[BookingController::class,'removeActivity']);

Route::get('/booking/review/{id}',[BookingController::class,'bookingSummary']);

Route::post('/booking/cancel/{id}',[BookingController::class,'cancelBooking']);

Route::post('/payment/order',[PaymentController::class,'createOrder']);

Route::post('/payment/success',[PaymentController::class,'paymentSuccess']);

Route::get('/booking/pdf/{id}',[PdfController::class,'downloadPdf']);