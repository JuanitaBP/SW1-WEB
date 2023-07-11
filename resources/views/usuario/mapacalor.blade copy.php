
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets-principal/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets-principal/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets-principal/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="assets-principal/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets-principal/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <link href="assets-principal/vendor/aos/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.1/dist/leaflet.css" />

        <style>
            #map {
                height: 550px;
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

        <!-- Template Main CSS File -->
        <link href="assets-principal/css/main.css" rel="stylesheet">

        <!-- =======================================================
        * Template Name: Logis
        * Updated: Mar 10 2023 with Bootstrap v5.2.3
        * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>
@stop

@section('content')



        <!-- ======= Header ======= -->
        {{-- <header class="header">
        <div id="header-container">
            @include('layout.header')
        </div>
    </header> --}}
        <!-- End Header -->

        <!-- ======= Hero Section ======= -->
        {{-- @include('layout.HeroSection') --}}
        <!-- End Hero Section -->






        <!-- Vendor JS Files -->
        <script src="assets-principal/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets-principal/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets-principal/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets-principal/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets-principal/vendor/aos/aos.js"></script>
        <script src="assets-principal/vendor/php-email-form/validate.js"></script>
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



<a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal_create_ciudad"
style="display: inline-block; padding: 10px 20px; background-color: blue; color: white; text-decoration: none; border-radius: 4px;">Agregar
denuncia</a>
<div id="chart-container"></div>
<div id="map"></div>

    @include('usuario.denuncia')

