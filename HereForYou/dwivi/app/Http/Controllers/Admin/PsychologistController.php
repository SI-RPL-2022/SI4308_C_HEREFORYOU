<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Psychologist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PsychologistController extends Controller
{
    public function index()
    {
        $items = Psychologist::orderBy('name','ASC')->get();

        return view('admin.pages.psychologist.index',[
            'title' => 'Data Psikolog',
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('admin.pages.psychologist.create',[
            'title' => 'Tambah Psikolog'
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required'],
            'specialist' => ['required'],
            'address' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required'],
            'photo' => ['image','mimes:jpg,jpeg,png']
        ]);

        $data = request()->all();
        if(request()->file('photo')){
            $data['photo'] = request()->file('photo')->store('psychologist','public');
        }else{
            $data['photo'] = NULL;
        }
        Psychologist::create($data);

        return redirect()->route('admin.psychologists.index')->with('success','Psikolog berhasil disimpan');
    }

    public function show($id)
    {
        $item = Psychologist::with('schedules','reviews')->findOrFail($id);
        return view('admin.pages.psychologist.show',[
            'title' => 'Detail Psikolog',
            'item' => $item
        ]);
    }

    public function edit($id)
    {
        $item = Psychologist::findOrFail($id);
        return view('admin.pages.psychologist.edit',[
            'title' => 'Edit Psikolog',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'name' => ['required'],
            'specialist' => ['required'],
            'address' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required'],
            'photo' => ['image','mimes:jpg,jpeg,png']
        ]);

        $item = Psychologist::findOrFail($id);
        $data = request()->all();
        if(request()->file('photo')){
            Storage::disk('public')->delete($item->photo);
            $data['photo'] = request()->file('photo')->store('psychologist','public');
        }else{
            $data['photo'] = $item->photo;
        }
        $item->update($data);

        return redirect()->route('admin.psychologists.index')->with('success','Psikolog berhasil disimpan');
    }

    public function destroy($id)
    {
        $item = Psychologist::findOrFail($id);
        Storage::disk('public')->delete($item->photo);
        $item->delete();
        return redirect()->route('admin.psychologists.index')->with('success','Psikolog berhasil dihapus');
    }
}
