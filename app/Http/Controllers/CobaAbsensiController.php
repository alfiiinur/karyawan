<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CobaAbsensi;
use App\Models\Karyawan;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class CobaAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensi = CobaAbsensi::all();

        return view('admin.absensi', compact('absensi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::all();

        return view('admin.absen', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'karyawan_id' => 'required',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'tanggal_masuk' => 'required',
        'keterangan' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Product::create($input);

        return redirect('/absensi')->with('success', 'Data absensi berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CobaAbsensi  $cobaAbsensi
     * @return \Illuminate\Http\Response
     */
    public function show(CobaAbsensi $cobaAbsensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CobaAbsensi  $cobaAbsensi
     * @return \Illuminate\Http\Response
     */
    public function edit(CobaAbsensi $cobaAbsensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CobaAbsensi  $cobaAbsensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CobaAbsensi $cobaAbsensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CobaAbsensi  $cobaAbsensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(CobaAbsensi $cobaAbsensi)
    {
        //
    }
}
