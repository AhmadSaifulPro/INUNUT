@extends('layout.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Membuat Tumpangan</h5>
                <h6 class="card-subtitle">Data Manusia
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('tumpangan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-3" hidden>
                                <label>ID Siswa</label>
                                <select class="form-control select2" name="id_siswa" id="id_siswa" data-toggle="select2">
                                    @foreach ( $siswa as $item )
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Lat Captain</label>
                                <input type="text" id="lat_captain" name="lat_captain" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div class="mb-3">
                                <label>Long Captain</label>
                                <input type="text" id="long_captain" name="long_captain" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <script>
                                var x = document.getElementById("lat_captain");
                                var y = document.getElementById("long_captain");
                                function getLocation() {
                                    if (navigator.geolocation) {
                                        navigator.geolocation.getCurrentPosition(showPosition);
                                    } else {
                                        x.value = "Geolocation is not supported by this browser.";
                                    }
                                }

                                function showPosition(position) {
                                    x.value = position.coords.latitude;
                                    y.value = position.coords.longitude;
                                }

                            </script>
                            <div class="mb-3">
                                <label>Asal</label>
                                <input type="text" name="asal" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div class="mb-3">
                                <label>Tujuan</label>
                                <input type="text" name="tujuan" class="form-control">
                                <span class="font-13 text-muted"></span>
                            </div>
                            <div class="mb-3">
                                <label>Jam Berangkat</label>
                                <input type="time" name="jam_berangkat" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Catatan</label>
                                <input type="text" name="catatan" class="form-control">
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
