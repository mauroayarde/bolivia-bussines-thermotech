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
                            class="dashboard-nav-dropdown-item active">Consulta 2</a><a href="{{ route('grafico3') }}"
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
                            KPI de Ventas por producto
                            <br/>
                            <p> </p>
                            <div class="card-footer" style="font-size: 15px">
                                <p class="card-text"> Seguidamente este KPI proporcionará la información de cuáles son los productos que más se han vendido en general en todas las sucursales juntas.</p>
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
                ['Productos', 'Ventas'],
                ['10 lts Calefon thermotech', 15],
                ['16 lts Calefon Lombard a GN', 425],
                ['16 lts Calefon Lombard a LPG', 78],
                ['20 lts Calefon Lombard a GN', 48],
                ['20 lts Calefon Lombard a LPG', 12],
                ['40 gls, termotanque Electrico American S.', 9],
                ['8,5 gls termotanque electrico', 15],
                ['Calefon Thermotech de 8KW', 40],
                ['Estufa 6500 Kcal.', 28],
                ['Extractor 80 cm', 19],
                ['Termotanque de 30 gls', 24],
                ['termotanque de 50 gls', 19]
            ]);

            var options = {
                chart: {
                    title: '',
                    subtitle: '',
                },
                bars: 'horizontal' // Required for Material Bar Charts.
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
@endsection
