@extends('layout.main')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Tumpangan</h3>
                <p class="text-subtitle text-muted">Masukan Data Tumpangan</p>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                {{-- <div class="pd-3">
                    <a href="{{ route('tumpangan.create') }}" class=" btn btn-primary float-left mb-2">+ Tambah Data</a>
            </div> --}}
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Pembuat Tumpangan</th>
                            <th>Penumpang</th>
                            <th>Tgl Tumpangan</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Jam Berangkat</th>
                            <th>Catatan</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('img/'.$item->foto) }}" width="100%"></td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                <?php
                                    if($item->status == 'Numpang'){
                                        echo $item->Penumpang->nama;
                                    }else{

                                    }
                                ?>
                            </td>
                            <td>{{ $item->tgl_tumpangan }}</td>
                            <td>{{ $item->asal }}</td>
                            <td>{{ $item->tujuan }}</td>
                            <td>{{ $item->jam_berangkat }}</td>
                            <td>{{ $item->catatan }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                @if ($item->id_siswa != auth()->guard('siswa')->user()->id)
                                @if ($item->status == 'Numpang')
                                <a class=" btn btn-danger float-left mb-2" disabled>Sudah Nebeng</a>
                                @else

                                <form action="{{ route('nebeng', $item->tumpangan_id) }}" method="post">
                                    @csrf
                                    <div class="mb-3" hidden>
                                        <label>Lat Penumpang</label>
                                        <input type="text" id="lat_penumpang" name="lat_penumpang" class="form-control">
                                        <span class="font-13 text-muted"></span>
                                    </div>
                                    <div class="mb-3" hidden>
                                        <label>Long Penumpang</label>
                                        <input type="text" id="long_penumpang" name="long_penumpang" class="form-control">
                                        <span class="font-13 text-muted"></span>
                                    </div>
                                    <script>
                                        var x = document.getElementById("lat_penumpang");
                                        var y = document.getElementById("long_penumpang");
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
                                    <button type="submit" class=" btn btn-success float-left mb-2">Tebeng</button>
                                </form>
                                @endif
                                @else
                                <a href="{{ route('cari_tumpangan.edit', $item->tumpangan_id) }}" class=" btn btn-success float-left mb-2">Edit</a>
                                {{-- <a href="{{ route('DetailTumpangan.index', $item->tumpangan_id ) }}" class=" btn btn-secondary float-left mb-2" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary{{ $item->tumpangan_id }}">Detail</a> --}}
                                <div class="modal fade" id="defaultModalPrimary{{ $item->tumpangan_id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Tebengan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body m-3">
                                                <div class="table-responsive">
                                                    <div class="page-heading">
                                                        <div class="page-title">
                                                            <div class="row">
                                                                <div class="col-12 col-md-6 order-md-1 order-last">
                                                                    <h3>Data Detail Tumpangan</h3>
                                                                    <p class="text-subtitle text-muted">Riwayat Tumpangan</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <section class="section">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        {{-- <span class="badge bg-success">Active</span> --}}
                                                                        <table class="table table-striped" id="table1">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>ID Siswa</th>
                                                                                    <th>ID Tumpangan</th>
                                                                                    <th>Status</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($data as $item)
                                                                                <tr>
                                                                                    <td>{{ $loop->iteration }}</td>
                                                                                    <td>
                                                                                        <?php
                                                                                            foreach(DB::table('siswa')->where('id',$item->penumpang)->get() as $siswa){
                                                                                                echo $siswa->nama;
                                                                                            }
                                                                                        ?>
                                                                                    </td>
                                                                                    <td>{{ $item->tumpangan_id }}</td>
                                                                                    <td>{{ $item->status }}</td>
                                                                                </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                                {{-- <p class="mb-0">Use Bootstrap’s JavaScript modal plugin to add
                                                    dialogs to your site for lightboxes, user notifications, or
                                                    completely custom content.
                                                </p> --}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                {{-- <a href="{{ route('cari_tumpangan.edit', $item->tumpangan_id) }}" class="btn btn-success btn-sm">Edit Status</a>
                                <form action="{{ route('selesai.store') }}" method="post">
                                    @csrf
                                    <input type="text" name="id_tumpangan" value="{{ $item->tumpangan_id }}" hidden>
                                    <input type="text" name="id_siswa" value="{{ $item->id_siswa }}" hidden>
                                    <input type="text" name="catatan" value="{{ $item->catatan }}" hidden>
                                    <button type="submit" class="btn btn-primary">Selesai</button>
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
</section>





<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2023 &copy; Ahmad Saiful</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">Ahmad Saiful</a></p>
        </div>
    </div>
</footer>
@endsection
