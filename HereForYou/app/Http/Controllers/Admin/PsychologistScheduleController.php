<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Psychologist;
use App\Models\PsychologistSchedule;
use Illuminate\Http\Request;

class PsychologistScheduleController extends Controller
{
    public function create($id)
    {
        $psychologist = Psychologist::findOrFail($id);
        $days = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
        return view('admin.pages.psychologst-schedule.create',[
            'psychologist' => $psychologist,
            'days' => $days
        ]);
    }

    public function store($psychologist_id)
    {
        $psychologist = Psychologist::findOrFail($psychologist_id);
        request()->validate([
            'day' => ['required'],
            'opened_at' => ['required'],
            'closed_at' => ['required']
        ]);
        $data = request()->all();
        $psychologist->schedules()->create($data);

        return redirect()->route('admin.psychologists.show',$psychologist->id)->with('success','Jadwal berhasil disimpan');
    }

    public function edit($psychologist_id,$id)
    {
        $item = PsychologistSchedule::where('psychologist_id',$psychologist_id)->where('id',$id)->firstOrFail();
        $days = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
        return view('admin.pages.psychologst-schedule.edit',[
            'title' => 'Edit Jadwal',
            'days' => $days,
            'item' => $item
        ]);
    }

    public function update($id)
    {
        $item = PsychologistSchedule::findOrFail($id);
        request()->validate([
            'day' => ['required'],
            'opened_at' => ['required'],
            'closed_at' => ['required']
        ]);
        $data = request()->all();
        $item->update($data);

        return redirect()->route('admin.psychologists.show',$item->psychologist_id)->with('success','Jadwal berhasil disimpan');
    }

    public function destroy($id)
    {
        $item = PsychologistSchedule::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success','Jadwal berhasil dihapus');
    }
}
