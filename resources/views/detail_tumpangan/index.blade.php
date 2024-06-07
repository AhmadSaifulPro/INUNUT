@extends('layout.main')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Detail Tumpangan</h3>
                <p class="text-subtitle text-muted">Riwayat Detail Tumpangan</p>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="page-heading">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-12 col-md-6 order-md-1 order-last">
                                    <h3>Detail Tumpangan</h3>
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
                                                @foreach ($data as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        {{ $data->Siswa->nama }}
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if($data->status == "Numpang"){
                                                                echo $data->Penumpang->nama;
                                                            }
                                                            ?>
                                                    </td>
                                                    <td>{{ $data->id }}</td>
                                                    <td>{{ $data->status }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div id='map'></div>
                                        <?php

                                        $initialMarkers = [
                                                [
                                                    'position' => [
                                                        'lat' => DB::table('tumpangan')->where('id', '=', $data->id)->pluck('lat_captain'),
                                                        'lng' => DB::table('tumpangan')->where('id', '=', $data->id)->pluck('long_captain'),
                                                        'ket'=>'Captain'
                                                    ],
                                                    'draggable' => true
                                                                                                        ],
                                                                                                        [
                                                    'position' => [
                                                        'lat' => DB::table('tumpangan')->where('id', '=', $data->id)->pluck('lat_penumpang'),
                                                        'lng' => DB::table('tumpangan')->where('id', '=', $data->id)->pluck('long_penumpang'),
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
                                    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

                                    <script>


                                      if (navigator.geolocation) {
                                        navigator.geolocation.getCurrentPosition(showPosition);
                                      }


                                    function showPosition(position) {
                                         $.ajaxSetup({
                                                headers: {
                                                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                             });
                                         $.ajax({
                                      url: "https://aljasoft.my.id/inunut/update_lat_long/"+{{ $data->id }},
                                      type: "post",
                                      data: {
                                        lat_captain: position.coords.latitude,
                                        long_captain: position.coords.longitude
                                      },
                                    });
                                      console.log(  "Latitude: " + position.coords.latitude +
                                      "<br>Longitude: " + position.coords.longitude);
                                    }
                                    </script>

                                    <script>
                                        alert(position.coords.latitude)
                                    </script>
                                    </div>
                                </div>
                            </div>

                        </section>

                    </div>
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

