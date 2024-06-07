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
                <form action="{{ route('DetailTumpangan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            {{-- <div class="mb-3">
                                <label>ID Siswa</label>
                                <select class="form-control select2" name="id_siswa" id="id_siswa" data-toggle="select2">
                                    @foreach ( $siswa as $item )
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            {{-- <div class="mb-3">
                                <label>ID Tumpangan</label>
                                <select class="form-control select2" name="id_tumpangan" id="id_tumpangan" data-toggle="select2">
                                    @foreach ( $tumpangan as $item )
                                    <option value="{{ $item->id }}">{{ $item->id }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="mb-3">
                                <label>ID Siswa</label>
                                <input type="text" name="id_siswa" value="{{ Auth()->guard('siswa')->user()->id }}" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label>ID Tumpangan</label>
                                <input type="text" name="id_tumpangan" value="{{ $_GET['id_tumpangan'] }}" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <input type="text" name="status" value="Numpang" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Konfirmasi Tumpangan</label>
                                <p>Dengan ini  .....</p>
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
