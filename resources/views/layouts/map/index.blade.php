@extends('layouts.admin')

@section('css')
<style>
    #map { height: 440px; }
</style>
@endsection

@section('content')
<div class="card">
    <div class="card-header mb-3 border-bottom border-3"><h4>Belajar Map Leaflet</h4>
        </div>
            <div class="container-xxl flex-grow-1 container-p-y">
            <div id="map"></div>
            
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script>
    const map = L.map('map').setView([-1.6731808,116.9433316], 8);

    L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}',{
    maxZoom: 5,
    subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);

    $(document).ready(function() {
        $.getJSON('/menu/map/titik/json', function(data){
            $.each(data, function(index){
                var marker = L.marker([parseFloat(data[index].longitude),parseFloat(data[index].latitude)]).addTo(map).on('click', function(e) {
                    var tableData = [
                    { nama: data[index].nama, harga: parseFloat(data[index].longitude) },
                    ];

                    // Membuat tabel HTML
                    var tableContent = '<table style="width: 100%;">';

                    tableData.forEach(function(item) {
                    tableContent += '<tr>' +
                        '<td style="padding: 8px;"><strong>Nama:</strong> ' + item.nama + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td style="padding: 8px;"><strong>Harga:</strong> ' + item.harga + '</td>' +
                        '</tr>';
                    });

                    tableContent += '</table>';
                    marker.on('click', function() {
                        marker.bindPopup(tableContent).openPopup()
                    });
                });
            });
        });
    });
    

    

    
</script>
@endsection

