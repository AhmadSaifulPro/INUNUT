<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class ProfileSiswa extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::where('id', auth()->guard('siswa')->user()->id)->get();
        // dd($data);
        return view('profile_siswa.index', compact('data'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd($id);
        $data = Siswa::FindorFail($id);
        return view('profile_siswa.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->file('foto')){
            $img = $request->file('foto');
            $foto = time(). '-'. $img->getClientOriginalName();
            $lokasi = 'img';
            $img->move($lokasi, $foto);
        }
        $data = Siswa::FindOrFail($id);
        $data->nisn = $request->nisn;
        $data->nis = $request->nis;
        $data->nik = $request->nik;
        $data->foto = $foto;
        $data->nama = $request->nama;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->kota_lahir = $request->kota_lahir;
        $data->gender = $request->gender;
        $data->alamat = $request->alamat;
        $data->telp = $request->telp;
        $data->no_sim = $request->no_sim;
        $data->nopol = $request->nopol;
        $data->merk = $request->merk;
        $data->warna = $request->warna;
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect()->route('inunut.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
