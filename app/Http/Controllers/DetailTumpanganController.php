<?php

namespace App\Http\Controllers;

use App\Models\DetailTumpangan;
use App\Models\Siswa;
use App\Models\Tumpangan;
use Illuminate\Http\Request;

class DetailTumpanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tumpangan::where('id_siswa','=',auth()->guard('siswa')->user()->id)->get();
        // dd($data);
        return view('detail_tumpangan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('detail_tumpangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


            $data = Tumpangan::FindOrFail($request->id_tumpangan);
            $data->id_penumpang = auth()->guard('siswa')->user()->id;
            echo $data->lat_penumpang = $request->lat_penumpang;
            echo $data->long_penumpang = $request->long_penumpang;
            $data->status = "Numpang";
            $data->save();

        // return redirect()->route('DetailTumpangan.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = DetailTumpangan::FindOrFail($id);
        $data->id_siswa = auth()->guard('siswa')->user()->id;
        $data->id_tumpangan = $request->id_tumpangan;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('DetailTumpangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
