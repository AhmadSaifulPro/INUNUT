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
                                            <input type="text" class="form-control" name="nisn" value="{{ @$data['0']->nisn }}" id="inputUsername" placeholder="" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="input" class="form-label">NIS</label>
                                            <input type="text" class="form-control" name="nis" value="{{ @$data['0']->nis }}" placeholder="" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="input" class="form-label">NIK</label>
                                            <input type="text" class="form-control" name="nik" value="{{ @$data['0']->nik }}" placeholder="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <img src="{{ asset('img/'.auth()->guard('siswa')->user()->foto) }}" class=" img-responsive mt-2" width="210" height="210" style="border-radius: 10px;" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="mb-3">
                                            <label for="input4" class="form-label">Nama</label>
                                            <input type="" class="form-control" name="nama" value="{{ @$data['0']->nama }}" id="input4" placeholder="" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">Kota Lahir</label>
                                            <input type="" class="form-control" name="kota_lahir" value="{{ @$data['0']->kota_lahir }}" id="input4" placeholder="" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">Tgl lahir</label>
                                            <input type="date" class="form-control" name="tgl_lahir" value="{{ @$data['0']->tgl_lahir }}" id="input4" placeholder="" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">Gender</label>
                                            <input type="" class="form-control" name="gender" value="{{ @$data['0']->gender }}" id="input4" placeholder="" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">Alamat</label>
                                            <input type="" class="form-control" name="alamat" value="{{ @$data['0']->alamat }}" id="input4" placeholder="" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">telp</label>
                                            <input type="" class="form-control" name="telp" value="{{ @$data['0']->telp }}" id="input4" placeholder="" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">No SIM</label>
                                            <input type="" class="form-control" name="No SIM" value="{{ @$data['0']->no_sim }}" id="input4" placeholder="" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">Nopol</label>
                                            <input type="" class="form-control" name="nopol" value="{{ @$data['0']->nopol }}" id="input4" placeholder="" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">Merk</label>
                                            <input type="" class="form-control" name="merk" value="{{ @$data['0']->merk }}" id="input4" placeholder="" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="input4" class="form-label">Warna</label>
                                            <input type="" class="form-control" name="warna" value="{{ @$data['0']->warna }}" id="input4" placeholder="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-auto pr-3 mt-4">
                                    <a href="{{ route('profile_siswa.edit', $data['0']->id) }}" class="btn btn-primary">Edit Profile </a>
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
