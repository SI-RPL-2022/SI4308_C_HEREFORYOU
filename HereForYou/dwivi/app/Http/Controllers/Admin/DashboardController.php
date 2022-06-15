<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Product;
use App\Models\Psychologist;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $count = [
            'user' => User::where('role','user')->count(),
            'booking' => Booking::count(),
            'psychologist' => Psychologist::count()
        ];

        $booking_latest = Booking::latest()->limit(10)->get();
        return view('admin.pages.dashboard',[
            'title' => 'Dashboard',
            'count' => $count,
            'booking_latest' => $booking_latest
        ]);
    }
}
