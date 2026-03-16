<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{

    public function downloadPdf($bookingId)
    {

        $data = Booking::with([
            'travelers',
            'hotels',
            'activities'
        ])->find($bookingId);

        $pdf = PDF::loadView('pdf.itinerary', $data);

        return $pdf->download('itinerary.pdf');
    }
}
