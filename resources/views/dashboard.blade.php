@extends('layout')

<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    .dashboard-content {
        margin: 0px;

    }

    .card {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header.bienvenida {
        background-color: #007bff;
        color: #fff;
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        padding: 20px;
    }

    .card-body {
        padding: 10px;
    }

    .alert.alert-success {
        margin-top: 20px;
    }

    .descripcion-inicio {
        margin-top: 20px;
    }

    .descripcion-inicio p {
        font-size: 16px;
        line-height: 1.6;
        color: #555;
    }

    .descripcion-inicio img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-top: 20px;
    }

    .chart-container {
        margin-top: 10px;
    }

    

  .columna1Inicio {
        font-size: 18px;
        line-height: 1.8;
        color: #333;
    }

    .columna2Inicio {
        text-align: center;
        padding: 20px;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .columna2Inicio h5 {
        font-size: 20px;
        font-weight: bold;
        color: #007bff;
    }

    .columna2Inicio img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

</style>


@section('content')
    <div class="dashboard">
        <div class="dashboard-nav">
            <header>
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
                <a href="#" class="brand-logo">
                    <i class="fas fa-anchor"></i>
                    <span><img src="{{ asset('logo.png') }}" alt=""></span>
                </a>
            </header>
            <nav class="dashboard-nav-list">

                <a href="{{ route('dashboard') }}" class="dashboard-nav-item">
                    <i class="fas fa-tachometer-alt"></i> Inicio
                </a>

                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-users"></i> Consultas
                    </a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="{{ route('grafico1') }}" class="dashboard-nav-dropdown-item">Consulta 1</a>
                        <a href="{{ route('grafico2') }}" class="dashboard-nav-dropdown-item">Consulta 2</a>
                        <a href="{{ route('grafico3') }}" class="dashboard-nav-dropdown-item">Consulta 3</a>
                        <a href="{{ route('grafico4') }}" class="dashboard-nav-dropdown-item">Consulta 4</a>
                        <a href="{{ route('grafico5') }}" class="dashboard-nav-dropdown-item">Consulta 5</a>
                    </div>
                </div>
                <a href="{{ route('perfil') }}" class="dashboard-nav-item"><i class="fas fa-user"></i> Perfil</a>
                <div class="nav-item-divider"></div>
            </nav>
        </div>

        <div class="dashboard-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 mt-4"> <!-- Agrega la clase "mt-4" para un margen superior -->
                        <div class="card">
                            <div class="card-header bienvenida">{{ __('¡ Bienvenido a Empresa Thermotech - Bolivia !') }}
                            </div>

                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="container text-center descripcion-inicio">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="columna1Inicio">
                                                Más de 10 años de funcionamiento en Bolivia como sucursales en distintos
                                                departamentos de toda Bolivia como pueden ser: La Paz, Sucre, Cochabamba,
                                                Santa
                                                Cruz.
                                                Cuenta con más de 20 sucursales en total y las cuales distribuyen una
                                                variedad
                                                de productos para el hogar como pueden ser: calefones, termotanques,
                                                estufas.
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="columna2Inicio">
                                                Calefon Lombard 16lts
                                                <span><img src="{{ asset('calefonLombard16lts.png') }}" alt=""
                                                        style="width: 150px; height: auto;"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chart-container" style="position: relative; height:40vh; width:60vw">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        const mobileScreen = window.matchMedia("(max-width: 990px )");

        $(document).ready(function() {

            setTimeout(function() {
                $(".alert.alert-success").fadeOut("slow");
            }, 5000);




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
    </script>
@endsection
