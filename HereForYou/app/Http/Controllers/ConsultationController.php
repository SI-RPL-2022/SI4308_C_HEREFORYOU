<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Psychologist;
use App\Models\PsychologistReview;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        $items = Psychologist::where('status',1)->inRandomOrder()->paginate(12);
        return view('pages.consultation.index',[
            'title' => 'Consultation',
            'psychologists' => $items
        ]);
    }

    public function show($id)
    {
        $item = Psychologist::with('schedules','reviews')->findOrFail($id);
        return view('pages.consultation.show',[
            'title' => 'Consultation Detail',
            'item' => $item
        ]);
    }

    public function rating()
    {
        $id = request('id');
        $psychologist_id = request('psychologist_id');

        $review = PsychologistReview::where('user_id',auth()->id())->where('psychologist_id',$psychologist_id)->first();
        if($review)
        {
            return redirect()->back()->with('error','Anda sudah memberi rating');
        }
        PsychologistReview::create([
            'user_id' => auth()->id(),
            'psychologist_id' => $psychologist_id,
            'text' => request('text'),
            'value' => request('score')
        ]);
        return redirect()->back()->with('success','Anda berhasil memberi rating');
    }
}
