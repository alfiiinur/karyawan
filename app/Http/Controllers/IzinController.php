<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izin;
use App\Models\Karyawan;

class IzinController extends Controller
{
    public function index()
    {
        return view('admin.izin', [
            'izin' => Izin::all(),
        ]);
    }

    public function create()
    {
        return view('admin.tambah_izin', [
            'karyawan' => Karyawan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'tgl_keluar' => 'required',
            'tgl_masuk' => 'required',
            'keterangan' => 'required',
        ]);
        Izin::create($request->all());

        return redirect('/izin');
    }

    public function destroy($id)
    {
        $izin = Izin::find($id);
        $izin->delete();

        return redirect('/izin');
    }
}
