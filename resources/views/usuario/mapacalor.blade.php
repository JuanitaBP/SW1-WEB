@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>



    <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal_create_ciudad"
style="display: inline-block; padding: 10px 20px; background-color: blue; color: white; text-decoration: none; border-radius: 4px;">Agregar
denuncia</a>


    @include('usuario.denuncia')
    <div id="map"></div>
    <div id="chart-container"></div>
    


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    
    <style>
        #chart-container {
            height: 400px;
        }

        #map {
            height: 300px;
        }

        #map-container {
            position: relative;
            top: 50px;
        }

        .header {
            /* Estilos para el encabezado */
        }

        .footer {
            /* Estilos para el pie de página */
        }
    </style>

@stop

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
        <!-- Leaflet and Leaflet.heat -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script src="https://unpkg.com/leaflet.heat/dist/leaflet-heat.js"></script>
        <script>
            // Inicializar el mapa
            let map = L.map('map').setView([-17.782458341269383, -63.1783962838879], 15);

            // Agregar la capa base del mapa
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                maxZoom: 18,
            }).addTo(map);

            // Categorías de puntos de calor
            const categories = [
                { name: 'Fuego', color: 'red', data: [{ lat: -17.782458341269383, lng: -63.1783962838879 }] },
                { name: 'Agua', color: 'blue', data: [{ lat: -17.785, lng: -63.18 }] },
                // Agrega más categorías aquí
            ];

            // Agregar los puntos de calor de cada categoría al mapa
            for (let category of categories) {
                let heatData = [];

                for (let point of category.data) {
                    heatData.push([point.lat, point.lng]);
                }

                L.heatLayer(heatData, { radius: 25, blur: 15, gradient: { 0.4: category.color, 0.8: category.color } })
                    .addTo(map);
            }

            // Preparar los datos para Highcharts
            const seriesData = categories.map(category => ({
                name: category.name,
                data: category.data.map(point => [point.lng, point.lat])
            }));

          // Configuración del gráfico
          const options = {
                chart: {
                    type: 'scatter',
                    zoomType: 'xy',
                    height: 400
                },
                title: {
                    text: 'Puntos de Calor'
                },
                xAxis: {
                    title: {
                        text: 'Longitud'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Latitud'
                    }
                },
                series: seriesData
            };

            // Generar el gráfico de Highcharts
            Highcharts.chart('chart-container', options);
        </script>



@stop