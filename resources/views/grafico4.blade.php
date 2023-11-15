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
                            style="font-size: 18px; color: #000; background-color: rgba(240,240,240); text-align: center;position: relative;width: 65vw;">
                            KPI de ventas por año
                            <br />
                            <p> </p>
                            <div class="card-footer" style="font-size: 15px">
                                <p class="card-text"> Se obtendrá con este indicador cuales son las ventas generales de cada mes por 
                                    año.</p>
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
                <div id="chart_div" style="width: 1110px; height: 450px; margin-left:-50px;"></div>
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
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Meses', 'Ventas'],
                ['Enero', 6.25 ],
                ['Febrero', 8.85],
                ['Marzo', 7.72],
                ['Abril', 8.93],
                ['Mayo', 9.3],
                ['Junio', 9.66],
                ['Julio', 8.05],
                ['Agosto', 4.95],
                ['Septiembre', 4.09],
                ['Octubre', 4.09],
                ['Noviembre', 3.40],
                ['Diciembre', 4.76]
            ]);

            var options = {
                title: '2018',
                hAxis: {
                    title: 'Meses',
                    titleTextStyle: {
                        color: '#333'
                    },
                    textStyle: {
                        fontSize: '12'
                    }
                },
                vAxis: {
                    minValue: 0
                }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
@endsection
