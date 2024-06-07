<?php

namespace App\Http\Controllers;

use App\Models\DetailTumpangan;
use App\Models\Tumpangan;
use Illuminate\Http\Request;

class NumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tumpangan::all();
        return view('detail_tumpangan.index', compact('data'));
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

        // $detail_tumpangan = Tumpangan::select('id_siswa', 'catatan')->where('id', $request->id_tumpangan)->value('id_siswa', 'catatan');

        // $detail = $detail_tumpangan;

        // $data = new DetailTumpangan();
        // $data->id_tumpangan = $request->id_tumpangan;
        // $data->id_siswa = auth()->guard('siswa')->user()->id_siswa;
        // $data->catatan = $request->catatan;
        // $data->save();
        // // dd($data);

        // Tumpangan::where('id', $request->id_tumpangan)->update([
        //     'id_siswa' => $detail,
        //     'catatan' => $detail
        // ]);

        // return redirect()->route('selesai.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
