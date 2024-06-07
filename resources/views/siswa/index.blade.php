@extends('layout.main')
@section('content')

<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Table Siswa</h3>
        </div>
    </div>

    <div class="card flex-fill">
        <div class="card-header">
            <h5 class="card-title mb-0">Siswa SMK SLF</h5>
        </div>
        <div class="card-body">
            <div class="pd-3">
                <a href="{{ route('inunut.create') }}" class=" btn btn-primary float-left mb-2">+ Tambah Data</a>
            </div>
            <div class="table-responsive">
                <table id="datatables-dashboard-projects" class="table table-striped my-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th class="d-none d-xl-table-cell">NIS</th>
                            <th class="d-none d-xl-table-cell">NIK</th>
                            <th class="d-none d-xl-table-cell">Foto</th>
                            <th>Nama</th>
                            <th class="d-none d-md-table-cell">Kota Lahir</th>
                            <th class="d-none d-md-table-cell">Tgl Lahir</th>
                            <th>Gender</th>
                            <th class="d-none d-md-table-cell">Alamat</th>
                            <th class="d-none d-md-table-cell">Telp</th>
                            <th>No SIM</th>
                            <th class="d-none d-md-table-cell">Nopol</th>
                            <th class="d-none d-md-table-cell">Merk</th>
                            <th>Warna</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <td><span class="badge bg-success">Done</span></td> --}}
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="d-none d-xl-table-cell">{{ $item->nisn }}</td>
                            <td class="d-none d-xl-table-cell">{{ $item->nis }}</td>
                            <td class="d-none d-md-table-cell">{{ $item->nik }}</td>
                            <td class="d-none d-md-table-cell"><img src="{{ asset('img/'.$item->foto) }}" width="140%"></td>
                            <td class="d-none d-xl-table-cell">{{ $item->nama }}</td>
                            <td class="d-none d-md-table-cell">{{ $item->kota_lahir }}</td>
                            <td class="d-none d-md-table-cell">{{ $item->tgl_lahir }}</td>
                            <td class="d-none d-md-table-cell">{{ $item->gender }}</td>
                            <td class="d-none d-md-table-cell">{{ $item->alamat }}</td>
                            <td class="d-none d-md-table-cell">{{ $item->telp }}</td>
                            <td class="d-none d-md-table-cell">{{ $item->no_sim }}</td>
                            <td class="d-none d-md-table-cell">{{ $item->nopol }}</td>
                            <td class="d-none d-md-table-cell">{{ $item->merk }}</td>
                            <td class="d-none d-md-table-cell">{{ $item->warna }}</td>
                            <td>
                                <a href="{{ route('inunut.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                <form onsubmit="return confirm('Yakin Mau Hapus Data ini')" class="d-inline" action="{{ route('inunut.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
