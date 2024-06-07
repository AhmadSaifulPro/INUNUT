<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

use function Ramsey\Uuid\v1;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::all();
        return view('siswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'nis' => 'required',
            'nik' => 'required',
            'foto' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'kota_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'no_sim' => 'required',
            'nopol' => 'required',
            'merk' => 'required',
            'warna' => 'required',
            'password' => 'required'
        ]);

        if($request->file('foto')){
            $img = $request->file('foto');
            $foto = time(). '-'. $img->getClientOriginalName();
            $lokasi = 'img';
            $img->move($lokasi, $foto);
        }

        $data = new Siswa();
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

        // dd($data);
        return redirect()->route('inunut.index');
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
        $data = Siswa::FindOrFail($id);
        return view('siswa.edit', compact('data'));

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
        Siswa::FindOrFail($id)->delete();
        return redirect()->route('inunut.index');
    }
}
