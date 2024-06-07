@extends('layout.main')

@section('content')

@endsection

<div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Tebengan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <div class="table-responsive">
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
                                <td>{{ $item->nama}}</td>
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
