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
                            class="dashboard-nav-dropdown-item">Consulta 1</a><a href="{{ route('grafico2') }}"
                            class="dashboard-nav-dropdown-item">Consulta 2</a><a href="{{ route('grafico3') }}"
                            class="dashboard-nav-dropdown-item">Consulta 3</a><a href="{{ route('grafico4') }}"
                            class="dashboard-nav-dropdown-item active">Consulta 4</a><a href="{{ route('grafico5') }}"
                            class="dashboard-nav-dropdown-item">Consulta 5</a></div>
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
                                <p class="card-text"> Se obtendrá con este indicador cuales son las ventas generales de cada
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
                <div id="chart_div" style="width: 1000px; height: 500px; margin-left:-30px;"></div>
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
                ['Años', 'Ventas'],
                ['2013', 1000],
                ['2014', 1170],
                ['2015', 660],
                ['2016', 700],
                ['2016', 500],
                ['2017', 300],
                ['2018', 1050],
                ['2019', 1030],
                ['2020', 800],
                ['2021', 900],
                ['2022', 1100]
            ]);

            var options = {
                hAxis: {
                    title: 'Años',
                    titleTextStyle: {
                        color: '#333'
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
