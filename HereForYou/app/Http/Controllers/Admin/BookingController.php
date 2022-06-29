<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendNotification;
use App\Models\Bank;
use App\Models\Booking;
use App\Models\Notification;
use App\Models\Psychologist;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function create()
    {
        return view('admin.pages.booking.create',[
            'title' => 'Buat Booking',
            'banks' => Bank::orderBy('name','ASC')->get(),
            'psychologists' => Psychologist::orderBy('name','ASC')->get(),
            'users' => User::where('role','user')->orderBy('name','ASC')->get()
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
        $data['user_id'] = request('user_id');
        $data['number'] = Carbon::now()->translatedFormat('y') . Carbon::now()->translatedFormat('m') . Carbon::now()->translatedFormat('d') . rand(100,999);
        $bank = Bank::findOrFail(request('bank_id'));
        $data['bank_name'] = $bank->name;
        $data['bank_number'] = $bank->number;
        Booking::create($data);

        return redirect()->route('admin.bookings.index')->with('success','Booking berhasil dibuat.');
    }

    public function edit($id)
    {
        $item = Booking::findOrFail($id);
        $bank_item = Bank::where('name',$item->bank_name)->where('number',$item->bank_number)->first();
        return view('admin.pages.booking.edit',[
            'title' => 'Edit Booking',
            'banks' => Bank::orderBy('name','ASC')->get(),
            'psychologists' => Psychologist::orderBy('name','ASC')->get(),
            'users' => User::where('role','user')->orderBy('name','ASC')->get(),
            'item' => $item,
            'bank_item' => $bank_item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'package' => ['required'],
            'media' => ['required'],
            'topic' => ['required'],
            'duration' => ['required'],
            'time' => ['required']
        ]);

        $data = request()->all();
        $item = Booking::findOrFail($id);
        $bank = Bank::findOrFail(request('bank_id'));
        $bank_name = $bank->name;
        $bank_number = $bank->number;
        $item->update([
            'cost' => $item->psychologist->price_hourly*request('duration'),
            'bank_name' => $bank_name,
            'bank_number' => $bank_number,
            'media' => request('media'),
            'package' => request('package'),
            'duration' => request('duration'),
            'time' => request('time'),
            'topic' => request('topic')
        ]);

        return redirect()->route('admin.bookings.index')->with('success','Booking berhasil diupdate.');
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
        if($booking->status === 'SUCCESS')
        {
            $title = 'Transaksi Berhasil Divalidasi';
            $description = 'Transaksi dengan No. ' . $booking->number . ' berhasil divalidasi.';
        }else if($booking->status === 'PENDING')
        {
            $title = 'Transaksi Dalam Proses Validasi';
            $description = 'Transaksi dengan No. ' . $booking->number . ' sedang dalam proses validasi.';
        }else
        {
            $title = 'Transaksi Gagal Divalidasi';
            $description = 'Transaksi dengan No. ' . $booking->number . ' gagal divalidasi.';
        }

        // create notification to table notification
        $notif = Notification::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $booking->user_id,
            'status' => 0
        ]);

        // send notification via email to user email
        Mail::to($booking->user->email)->send(new SendNotification('Transaksi',$notif->title,$notif->description,$booking));

        return redirect()->route('admin.bookings.index')->with('success','Status Booking berhasil diperbaharui');
    }
}
