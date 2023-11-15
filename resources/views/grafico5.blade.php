@extends('layout')



@section('content')
    <div class='dashboard'>
        <div class="dashboard-nav">
            <header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a><a href="#" class="brand-logo"><i
                        class="fas fa-anchor"></i> <span><img src="{{ asset('logo.png') }}" alt=""></span></a></header>
            <nav class="dashboard-nav-list"><a href="{{ route('dashboard') }}" class="dashboard-nav-item"><i
                        class="fas fa-tachometer-alt"></i> Home
                </a>
                <div class='dashboard-nav-dropdown'><a href="#!"
                        class="dashboard-nav-item dashboard-nav-dropdown-toggle active"><i class="fas fa-users"></i> Reportes </a>

                    <div class='dashboard-nav-dropdown-menu'><a href="{{ route('grafico1') }}"
                            class="dashboard-nav-dropdown-item active">KPI de Ventas por sucursal </a><a href="{{ route('grafico2') }}"
                            class="dashboard-nav-dropdown-item">KPI de Ventas por producto </a><a href="{{ route('grafico3') }}"
                            class="dashboard-nav-dropdown-item">KPI de Ventas por mes/año </a><a href="{{ route('grafico4') }}"
                            class="dashboard-nav-dropdown-item">KPI de ventas por año </a><a href="{{ route('grafico5') }}"
                            class="dashboard-nav-dropdown-item">KPI monto de ventas por producto </a></div>
                            
                </div>
                <a href="{{ route('perfil') }}" class="dashboard-nav-item"><i class="fas fa-user"></i> Perfil </a>
                <div class="nav-item-divider"></div>
            </nav>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md">

                    <div class="card" style="margin-top: 30px;">
                        <div class="card-body"
                            style="font-size: 18px; color: #000; background-color: rgba(240,240,240); text-align: center;position: relative;width: 60vw;">
                            KPI monto de ventas por producto
                            <br />
                            <p> </p>
                            <div class="card-footer" style="font-size: 15px">
                                <p class="card-text"> El siguiente indicador ayudará a saber cuáles son las ganancias en
                                    base a las ventas realizadas por cada producto.</p>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <center>
                <div id="barchart_material" style="width: 900px; height: 450px; margin-top:50px;"></div>
            </center>
        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        const mobileScreen = window.matchMedia("(max-width: 990px )");
        $(document).ready(function() {
            $(".dashboard-nav-dropdown-toggle").click(function() {
                $(this).closest(".dashboard-nav-dropdown")
                    .toggleClass("show")
                    .find(".dashboard-nav-dropdown")
                    .removeClass("show");
                $(this).parent()
                    .siblings()
                    .removeClass("show");
            });
            $(".menu-toggle").click(function() {
                if (mobileScreen.matches) {
                    $(".dashboard-nav").toggleClass("mobile-show");
                } else {
                    $(".dashboard").toggleClass("dashboard-compact");
                }
            });
        });


        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Mes/Productos', 'Monto Total'],
                ['Enero 20 lts Calefon Lombard a GN', 3.95],
                ['Febrero 20 lts Calefon Lombard a LPG', 3.40],
                ['Marzo Calefon Thermotech de 8KW', 2.37],
                ['Abril 10 lts Calefon thermotech', 2.66],
                ['Mayo Estufa 6500 Kcal.', 2.15],
                ['Junio 8,5 gls termotanque electrico', 3.5],
                ['Julio 40 gls, termotanque Electrico American S.', 2.42],
                ['Agosto 16 lts Calefon Lombard a GN', 2.8],
                ['Septiembre termotanque de 50 gls', 1.875],
                ['Octubre Termotanque de 30 gls', 2.86],
                ['Noviembre Extractor 80 cm', 2.79],
                ['Diciembre 16 lts Calefon Lombard a LPG', 3.97]
               
                
            ]);

            var options = {
                chart: {
                    title: '2019',
                    subtitle: '',
                },
                bars: 'horizontal' // Required for Material Bar Charts.
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
@endsection
