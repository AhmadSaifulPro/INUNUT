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
                <form action="{{ route('inunut.update', $data->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>NISN</label>
                                <input type="text" name="nisn" value="{{ @$data->nisn }}" class="form-control">
                                <span class="font-13"></span>
                            </div>
                            <div class="mb-3">
                                <label>NIS</label>
                                <input type="text" name="nis" value="{{ @$data->nis }}" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div class="mb-3">
                                <label>NIK</label>
                                <input type="text" name="nik" value="{{ @$data->nik }}" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div class="mb-3">
                                <label>Foto</label>
                                <input type="file" name="foto" value="{{ @$data->foto }}" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" name="nama" value="{{ @$data->nama }}" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div class="mb-3">
                                <label>Kota Lahir</label>
                                <input type="text" name="kota_lahir" value="{{ @$data->kota_lahir }}" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div class="mb-3">
                                <label>Tgl Lahir</label>
                                <input type="date" name="tgl_lahir" value="{{ @$data->tgl_lahir }}" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div>
                                <label>Gender</label>
                                <select class="form-control select2" name="gender" data-toggle="select2">
                                    <option value="Laki-Laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label>Alamat</label>
                                <input type="text" name="alamat" value="{{ @$data->alamat }}" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div class="mb-3">
                                <label>Telp</label>
                                <input type="text" name="telp" value="{{ @$data->telp }}" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div class="mb-3">
                                <label>No SIM</label>
                                <input type="text" name="no_sim" value="{{ @$data->no_sim }}" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div class="mb-3">
                                <label>nopol</label>
                                <input type="text" name="nopol" value="{{ @$data->nopol }}" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div class="mb-3">
                                <label>Merk</label>
                                <input type="text" name="merk" value="{{ @$data->merk }}" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div class="mb-3">
                                <label>Warna</label>
                                <input type="text" name="warna" value="{{ @$data->warna }}" class="form-control">
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
