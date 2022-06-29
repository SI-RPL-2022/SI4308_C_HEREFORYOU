<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $items = Notification::where('user_id',auth()->id())->latest()->paginate(10);
        return view('pages.notification.index',[
            'title' => 'Notifikasi',
            'items' => $items
        ]);
    }

    public function update()
    {
        $id = request('id');
        Notification::where('id',$id)->update([
            'status' => 1
        ]);

        return redirect()->back();
    }
}
