<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Karyawan;
// use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Models\Absensi;

class DataController extends Controller
{
public function index()
{
    $data = Absensi::all();
    // dd($data);
    return view('admin.absensi', 
    [
        'data' => $data
        ]);
}


    public function create()
    {
        $karyawan = Karyawan::all();
        return view('admin.absen', compact('karyawan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_masuk' => 'required',
            'keterangan' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('images'), $nama_foto);
            $data['foto'] = $nama_foto;
        }

        Absensi::create($data);

        return redirect('/absensi')->with('success', 'Data berhasil disimpan.');
    }
}