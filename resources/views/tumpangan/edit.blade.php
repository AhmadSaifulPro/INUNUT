@extends('layout.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Masukan Data Siswa</h5>
                <h6 class="card-subtitle">Data Manusia
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('tumpangan.update', $data->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-3" hidden>
                                <label>ID  Siswa</label>
                                <select class="form-control select2" name="id_siswa" id="id_siswa" data-toggle="select2">
                                    <option disabled value>Pilih Siswa</option>
                                    <option value="{{ $data->id_siswa }}">{{ $data->Siswa->nama }}</option>
                                    @foreach ( $siswa as $item )
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3" hidden>
                                <label>ID Penumpang</label>
                                <input type="text" class="form-control select2" name="id_penumpang" id="id_siswa">
                                    @foreach ( $siswa as $item )
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </input>
                            </div>
                            <div class="mb-3" hidden>
                                <label>Tgl Tumpangan</label>
                                <input type="date" name="tgl_tumpangan" value="{{ @$data->tgl_tumpangan }}" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div class="mb-3" >
                                <label>Asal</label>
                                <input type="text" name="asal" value="{{ @$data->asal }}" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div class="mb-3" >
                                <label>Tujuan</label>
                                <input type="text" name="tujuan" value="{{ @$data->tujuan }}" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div class="mb-3">
                                <label>Jam Berangkat</label>
                                <input type="time" name="jam_berangkat" value="{{ @$data->jam_berangkat }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Catatan</label>
                                <input type="text" name="catatan" value="{{ @$data->catatan }}" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                        </div>
                        <div class="ml-auto pr-3 mt-4">
                            <button type="submit" class="btn  btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
