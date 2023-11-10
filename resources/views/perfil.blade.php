@extends('layout')

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
                <a href="#" class="dashboard-nav-item"><i class="fas fa-home"></i> Home</a>
                <!--
                <a href="{{ route('dashboard') }}" class="dashboard-nav-item">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
        -->
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
                            <div class="card-header bienvenida">{{ __(' Mi Perfil') }}
                            </div>

                            <div class="card-body">
                                

                                <div class="container text-center descripcion-inicio">
                                    <div class="row">
                                      
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
    
@endsection
