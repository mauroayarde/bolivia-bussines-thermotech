
@extends('layout')

  

@section('content')

<div class='dashboard'>
    <div class="dashboard-nav">
        <header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a><a href="#"
                                                                                   class="brand-logo"><i
                class="fas fa-anchor"></i> <span><img src="{{ asset('logo.png') }}" alt=""></span></a></header>
        <nav class="dashboard-nav-list"><a href="#" class="dashboard-nav-item"><i class="fas fa-home"></i>
            Home </a><a
                href="{{ route('dashboard') }}" class="dashboard-nav-item active"><i class="fas fa-tachometer-alt"></i> dashboard
        </a>            <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i
                    class="fas fa-users"></i> Consultas </a>

                <div class='dashboard-nav-dropdown-menu'><a href="{{ route('grafico1') }}" class="dashboard-nav-dropdown-item">Consulta 1</a><a
                        href="{{ route('grafico2') }}" class="dashboard-nav-dropdown-item">Consulta 2</a><a
                        href="{{ route('grafico3') }}"
                        class="dashboard-nav-dropdown-item">Consulta 3</a><a
                        href="{{ route('grafico4') }}" class="dashboard-nav-dropdown-item">Consulta 4</a><a
                        href="{{ route('grafico5') }}" class="dashboard-nav-dropdown-item">Consulta 5</a></div>
            </div>
            <a
                    href="#" class="dashboard-nav-item"><i class="fas fa-user"></i> Perfil </a>
          <div class="nav-item-divider"></div>
        </nav>
    </div>

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" style="margin-top: 30px;">
                <div class="card-body" style="font-size: 18px; color: #000; background-color: rgba(240,240,240); text-align: center;position: relative;width: 65vw;">
                    Consulta 1
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
        <div class="chart-container" style="position: relative; height: 60vh; width: 60vw;">
            <canvas id="myChart"></canvas>
        </div>
    </center>
</div>



<script>
const mobileScreen = window.matchMedia("(max-width: 990px )");
$(document).ready(function () {
    $(".dashboard-nav-dropdown-toggle").click(function () {
        $(this).closest(".dashboard-nav-dropdown")
            .toggleClass("show")
            .find(".dashboard-nav-dropdown")
            .removeClass("show");
        $(this).parent()
            .siblings()
            .removeClass("show");
    });
    $(".menu-toggle").click(function () {
        if (mobileScreen.matches) {
            $(".dashboard-nav").toggleClass("mobile-show");
        } else {
            $(".dashboard").toggleClass("dashboard-compact");
        }
    });
});


const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: ['Achumani', 'Cota Cota', 'G. Concordia', 'Miraflores', 'San Pedro'],
        datasets: [{
            label: 'Cantidad de...',
            data: [312, 91, 33, 221, 75],
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
	    options: {
},
	plugins:{
title: {
        display: true,
        text: 'Chart.js Doughnut Chart'
      }
}
});
</script>
@endsection
