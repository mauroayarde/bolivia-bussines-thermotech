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
                            class="dashboard-nav-dropdown-item active">Consulta 1</a><a href="{{ route('grafico2') }}"
                            class="dashboard-nav-dropdown-item">Consulta 2</a><a href="{{ route('grafico3') }}"
                            class="dashboard-nav-dropdown-item">Consulta 3</a><a href="{{ route('grafico4') }}"
                            class="dashboard-nav-dropdown-item">Consulta 4</a><a href="{{ route('grafico5') }}"
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
                            KPI de Ventas por sucursal
                            <br />
                            <p> </p>
                            <div class="card-footer" style="font-size: 15px">
                                <p class="card-text"> El siguiente indicador ayudará a la empresa a saber cuáles son las
                                    sucursales que más han vendido.</p>
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
                <div id="piechart_3d" style="width: 1100px; height: 500px;"></div>
            </center>
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

            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Ventas', 'Ventas por Sucursal'],
                    ['Achumani', 312],
                    ['Cota Cota', 91],
                    ['G. Concordia', 33],
                    ['Miraflores', 221],
                    ['San Pedro', 75]
                ]);

                var options = {
                    title: '',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>
    @endsection
