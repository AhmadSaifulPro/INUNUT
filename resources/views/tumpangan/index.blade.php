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
                <div class="pd-3">
                    <a href="{{ route('tumpangan.create') }}" class=" btn btn-primary float-left mb-2">+ Buat Tebengan</a>
                </div>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->Siswa->nama}}</td>
                                <td>{{ $item->tgl_tumpangan }}</td>
                                <td>{{ $item->asal }}</td>
                                <td>{{ $item->tujuan }}</td>
                                <td>{{ $item->jam_berangkat }}</td>
                                <td>{{ $item->catatan }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{ route('tumpangan.edit', $item->id) }}" class="btn btn-success btn-sm" style="width: 100%"><i class="fa-regular fa-pen-to-square"></i></a>

                                    <form action="{{ route('tumpangan.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit"
                                        class="btn btn-danger btn-sm" style="width: 100%"><i class="fa-regular fa-trash-can"></i></button>
                                    </form>

                                    <a href="#" class=" btn btn-secondary float-left mb-2" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary{{ $item->id }}">Detail</a>
                                <div class="modal fade" id="defaultModalPrimary{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                                    <th>ID Penumpang</th>
                                                                                    <th>ID Tumpangan</th>
                                                                                    <th>Status</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($data as $item)
                                                                                <tr>
                                                                                    <td>{{ $loop->iteration }}</td>
                                                                                    <td>
                                                                                        {{ $item->Siswa->nama }}
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                                                                                            if($item->status == "Numpang"){
                                                                                                echo $item->Penumpang->nama;
                                                                                            }
                                                                                            ?>
                                                                                    </td>
                                                                                    <td>{{ $item->id }}</td>
                                                                                    <td>{{ $item->status }}</td>
                                                                                </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                        <div id='map'></div>
<?php
    $initialMarkers = [
            [
                'position' => [
                    'lat' => DB::table('tumpangan')->where('id', '=', $item->id)->pluck('lat_captain'),
                    'lng' => DB::table('tumpangan')->where('id', '=', $item->id)->pluck('long_captain'),
                    'ket'=>'Captain'
                ],
                'draggable' => true
                                                                    ],
                                                                    [
                'position' => [
                    'lat' => DB::table('tumpangan')->where('id', '=', $item->id)->pluck('lat_penumpang'),
                    'lng' => DB::table('tumpangan')->where('id', '=', $item->id)->pluck('long_penumpang'),
                    'ket'=>'Penumpang'
                ],
                'draggable' => true
            ]
        ];
?>
<script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
<script>
    let map, markers = [];
    /* ----------------------------- Initialize Map ----------------------------- */
    function initMap() {
        map = L.map('map', {
            center: {
                lat: 28.626137,
                lng: 79.821603,
            },
            zoom: 15
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        map.on('click', mapClicked);
        initMarkers();
    }
    initMap();

    /* --------------------------- Initialize Markers --------------------------- */
    function initMarkers() {
        const initialMarkers = <?php echo json_encode($initialMarkers); ?>;

        for (let index = 0; index < initialMarkers.length; index++) {

            const data = initialMarkers[index];
            const marker = generateMarker(data, index);
            marker.addTo(map).bindPopup(`<b>${data.position.ket}</b>`);
            map.panTo(data.position);
            markers.push(marker)
        }
    }

    function generateMarker(data, index) {
        return L.marker(data.position, {
                draggable: data.draggable
            })
            .on('click', (event) => markerClicked(event, index))
            .on('dragend', (event) => markerDragEnd(event, index));
    }

    /* ------------------------- Handle Map Click Event ------------------------- */
    function mapClicked($event) {
        console.log(map);
        console.log($event.latlng.lat, $event.latlng.lng);
    }

    /* ------------------------ Handle Marker Click Event ----------------------- */
    function markerClicked($event, index) {
        console.log(map);
        console.log($event.latlng.lat, $event.latlng.lng);
    }

    /* ----------------------- Handle Marker DragEnd Event ---------------------- */
    function markerDragEnd($event, index) {
        console.log(map);
        console.log($event.target.getLatLng());
    }
</script>

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
                                </td>
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
            <p>2023 &copy; Ahmad Saiful</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                href="http://ahmadsaugi.com">Ahmad Saiful</a></p>
        </div>
    </div>
</footer>
@endsection


