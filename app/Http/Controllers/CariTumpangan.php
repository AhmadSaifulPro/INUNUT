<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use App\Models\Tumpangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CariTumpangan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $jenis_kelamin = Auth()->guard('siswa')->user()->gender;

        // $data = Tumpangan::where('tgl_tumpangan', '=', today())->where('gender', '=', $jenis_kelamin)->get();

        $data = Tumpangan::join('siswa', 'tumpangan.id_siswa', '=', 'siswa.id')
            ->select('siswa.*', 'tumpangan.*', 'tumpangan.id as tumpangan_id', 'siswa.id as captain')
            ->where('tumpangan.tgl_tumpangan', '=' , today())
            // ->where('tumpangan.status', '=' , 'Kosong')
            // ->where('tumpangan.id_siswa', '!=' , Auth()->guard('siswa')->user()->id)
            ->where('siswa.gender',  '=' , $jenis_kelamin)->get();

        // dd($data);
        // echo $jenis_kelamin;
        return view('cari.cari_tumpangan', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Tumpangan::findorFail($id);
        return view('cari.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::all();
        $data = Tumpangan::FindOrFail($id);
        // dd($data);
        return view('cari.edit', compact('data', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // echo $id;
        $data = Tumpangan::FindOrFail($id);
        $data->id_siswa = Auth()->guard('siswa')->user()->id;
        $data->tgl_tumpangan = $request->tgl_tumpangan;
        $data->asal = $request->asal;
        $data->tujuan = $request->tujuan;
        $data->catatan = $request->catatan;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('cari_tumpangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
