<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $items = Booking::latest()->get();

        return view('admin.pages.booking.index',[
            'title' => 'Data Booking',
            'items' => $items
        ]);
    }

    public function destroy($id)
    {
        Booking::destroy($id);
        return redirect()->route('admin.bookings.index')->with('success','Booking berhasil dihapus');
    }

    public function setStatus($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update([
            'status' => request('status')
        ]);
        return redirect()->route('admin.bookings.index')->with('success','Status Booking berhasil diperbaharui');
    }
}
