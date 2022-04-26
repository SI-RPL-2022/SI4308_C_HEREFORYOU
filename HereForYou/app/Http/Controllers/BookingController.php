<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Booking;
use App\Models\Psychologist;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create($id)
    {
        $psychologist = Psychologist::findOrFail($id);
        return view('pages.booking.create',[
            'title' => 'Booking',
            'psychologist' => $psychologist
        ]);
    }

    public function store()
    {
        request()->validate([
            'psychologist_id' => ['required'],
            'package' => ['required'],
            'media' => ['required'],
            'topic' => ['required'],
            'duration' => ['required'],
            'time' => ['required']
        ]);

        $data = request()->all();
        $psychologist = Psychologist::findOrFail(request('psychologist_id'));
        $data['cost'] = $psychologist->price_hourly*request('duration');
        $data['user_id'] = auth()->id();
        $data['number'] = Carbon::now()->translatedFormat('y') . Carbon::now()->translatedFormat('m') . Carbon::now()->translatedFormat('d') . rand(100,999);
        $data['bank_name'] = Bank::where('status',1)->first()->name;
        $data['bank_number'] = Bank::where('status',1)->first()->number;
        Booking::create($data);

        return redirect()->route('booking.success',$data['number'])->with('success','Silahkan lakukan pembayaran');
    }

    public function success($number)
    {
        $item = Booking::where('number',$number)->firstOrFail();
        return view('pages.booking.success',[
            'title' => 'Silahkan lakukan Pembayaran',
            'item' => $item,
            'bank' => Bank::where('status',1)->first()
        ]);
    }
}
