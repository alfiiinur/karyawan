<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pelanggaran;
use App\Models\Karyawan;


class PelanggaranController extends Controller
{
    public function index()
    {
        $pelanggaran = DB::table('pelanggarans')
            ->selectRaw('karyawan_id, nama, COUNT(*) as total_pel, SUM(point) as total_point')
            ->join('karyawans', 'karyawans.id', '=', 'pelanggarans.karyawan_id')
            ->groupBy('karyawan_id')
            ->orderBy('total_point', 'desc')
            ->get();

        // dd($pelanggaran);
        return view('admin.pelanggaran', [
            'pelanggaran' => $pelanggaran,
        ]);
    }

    public function create()
    {
        return view('admin.tambah_pelanggaran', [
            'karyawan' => Karyawan::all(),
        ]);
    }

    public function detail($id){
        $pelanggaran = Pelanggaran::where('karyawan_id', $id)
                        ->get();
        $karyawan = Karyawan::where('id', $id)
                        ->get();
        // dd($pelanggaran);
        return view('admin.detail_pelanggaran', [
            'pelanggaran' => $pelanggaran,
            'karyawan' => $karyawan,
        ]);
    }

    public function store(Request $request)
    {
        Pelanggaran::create($request->all());

        return redirect('/pelanggaran');
    }

    public function destroy($id)
    {
        DB::table('pelanggarans')->where('karyawan_id', $id)->delete();

        return redirect('/pelanggaran');
    }
}
