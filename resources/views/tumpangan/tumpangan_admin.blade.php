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
                <div class="table-responsive">
                    {{-- <span class="badge bg-success">Active</span> --}}
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Siswa</th>
                                <th>Tgl Tumpangan</th>
                                <th>Asal</th>
                                <th>Tujuan</th>
                                <th>Jam Berangkat</th>
                                <th>Catatan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->Siswa['nama']}}</td>
                                <td>{{ $item->tgl_tumpangan }}</td>
                                <td>{{ $item->asal }}</td>
                                <td>{{ $item->tujuan }}</td>
                                <td>{{ $item->jam_berangkat }}</td>
                                <td>{{ $item->catatan }}</td>
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

<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2023 &copy; Saipul Devoloper</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                    href="http://ahmadsaugi.com">Ahmad Saiful</a></p>
        </div>
    </div>
</footer>
@endsection

