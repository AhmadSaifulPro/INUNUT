@extends('layout.main')
@section('content')

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Settings</h1>

        <div class="row">
            <div class="col-md-9 col-xl-10">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">DATA SAYA</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="inputUsername" class="form-label">NISN</label>
                                            <input type="text" class="form-control" name="nisn" value="{{ @$data->nisn }}" id="inputUsername" placeholder="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="input" class="form-label">NIS</label>
                                            <input type="text" class="form-control" name="nis" value="{{ @$data->nis }}" placeholder="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="input" class="form-label">NIK</label>
                                            <input type="text" class="form-control" name="nik" value="{{ @$data->nik }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <img src="{{ asset('img/'.auth()->guard('siswa')->user()->foto) }}" class=" img-responsive mt-2" width="210" height="210" style="border-radius: 10px;"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="mb-3">
                                            <label for="input4" class="form-label">Nama</label>
                                            <input type="" class="form-control" name="nama" value="{{ @$data->nama }}" id="input4" placeholder="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">Kota Lahir</label>
                                            <input type="" class="form-control" name="kota_lahir" value="{{ @$data->kota_lahir }}" id="input4" placeholder="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">Tgl lahir</label>
                                            <input type="date" class="form-control" name="tgl_lahir" value="{{ @$data->tgl_lahir }}" id="input4" placeholder="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">Gender</label>
                                            <input type="" class="form-control" name="gender" value="{{ @$data->gender }}" id="input4" placeholder="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">Alamat</label>
                                            <input type="" class="form-control" name="alamat" value="{{ @$data->alamat }}" id="input4" placeholder="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">telp</label>
                                            <input type="" class="form-control" name="telp" value="{{ @$data->telp }}" id="input4" placeholder="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">No SIM</label>
                                            <input type="" class="form-control" name="No SIM" value="{{ @$data->no_sim }}" id="input4" placeholder="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">Nopol</label>
                                            <input type="" class="form-control" name="nopol" value="{{ @$data->nopol }}" id="input4" placeholder="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">Merk</label>
                                            <input type="" class="form-control" name="merk" value="{{ @$data->merk }}" id="input4" placeholder="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">Warna</label>
                                            <input type="" class="form-control" name="warna" value="{{ @$data->warna }}" id="input4" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-auto pr-3 mt-4">
                                    <a href="{{ route('profile_siswa.update', $data->id) }}" class="btn btn-primary">Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection
