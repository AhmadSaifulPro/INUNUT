<?php

namespace App\Http\Controllers;

use App\Models\DetailTumpangan;
use App\Models\Siswa;
use App\Models\Tumpangan;
use Illuminate\Http\Request;

class TumpanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Tumpangan::where('id_siswa','=',auth()->guard('siswa')->user()->id)->get();
        // dd($data);
        return view('tumpangan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        return view('tumpangan.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required',
            'lat_captain' => 'required',
            'long_captain' => 'required',
            'asal' => 'required',
            'tujuan' => 'required',
            'jam_berangkat' => 'required',
            'catatan' => 'required',
        ]);

        $data = new Tumpangan();
        $data->id_siswa = Auth()->guard('siswa')->user()->id;
        $data->lat_captain = $request->lat_captain;
        $data->long_captain = $request->long_captain;
        $data->tgl_tumpangan = date('Y-m-d');
        $data->asal = $request->asal;
        $data->tujuan = $request->tujuan;
        $data->jam_berangkat = $request->jam_berangkat;
        $data->catatan = $request->catatan;
        $data->status = 'Kosong';
        $data->save();
        // dd($data);
        return redirect()->route('tumpangan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::all();
        $data = Tumpangan::FindOrFail($id);
        return view('tumpangan.edit', compact('data', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Tumpangan::FindOrFail($id);
        $data->id_siswa = $request->id_siswa;
        $data->tgl_tumpangan = date('Y-m-d');
        $data->asal = $request->asal;
        $data->tujuan = $request->tujuan;
        $data->catatan = $request->catatan;
        $data->save();

        return redirect()->route('tumpangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tumpangan::FindOrFail($id)->delete();
        return redirect()->route('tumpangan.index');
    }

    public function nebeng(Request $request,$id){
        $data = Tumpangan::findorFail($id);
        $data->id_penumpang = auth()->guard('siswa')->user()->id;
        $data->lat_penumpang = $request->lat_penumpang;
        $data->long_penumpang = $request->long_penumpang;
        $data->status = 'Numpang';
        $data->save();
        return redirect()->back();
    }
}
