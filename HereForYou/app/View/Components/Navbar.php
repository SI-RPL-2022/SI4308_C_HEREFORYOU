<?php

namespace App\View\Components;

use App\Models\Notification;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.navbar',[
            'count_notif' => Notification::where('status',0)->where('user_id',auth()->id())->latest()->count()
        ]);
    }
}
