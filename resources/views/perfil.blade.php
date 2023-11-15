@extends('layout')

<style>
      .card-header.bienvenida {
        background-color: #007bff;
        color: #fff;
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        padding: 20px;
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
        <a href="{{ route('dashboard') }}" class="dashboard-nav-item"><i class="fas fa-home"></i> Home</a>
        <!--
        <a href="{{ route('dashboard') }}" class="dashboard-nav-item">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
-->
        <div class='dashboard-nav-dropdown'>
            <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                <i class="fas fa-users"></i> Reportes
            </a>
            <div class='dashboard-nav-dropdown-menu'>
                <a href="{{ route('grafico1') }}" class="dashboard-nav-dropdown-item">KPI de Ventas por sucursal</a>
                <a href="{{ route('grafico2') }}" class="dashboard-nav-dropdown-item">KPI de Ventas por producto</a>
                <a href="{{ route('grafico3') }}" class="dashboard-nav-dropdown-item">KPI de Ventas por mes/año</a>
                <a href="{{ route('grafico4') }}" class="dashboard-nav-dropdown-item">KPI de ventas por año</a>
                <a href="{{ route('grafico5') }}" class="dashboard-nav-dropdown-item">KPI monto de ventas por producto</a>
            </div>
        </div>
        <a href="{{ route('perfil') }}" class="dashboard-nav-item active"><i class="fas fa-user"></i> Perfil</a>
        <div class="nav-item-divider"></div>
    </nav>
</div>

<div class="container mb-5" style="background-color: #fff; margin-top:40px; margin-left:20px;">

    <!--- Mensajes -->
    @include('msjs')
    
    <div class="card">
        <div class="card-header bienvenida">{{ __('Actualizar mis datos') }}
        </div>
      <div class="row justify-content-center">
          <div class="col-md-8">
            <form action="{{route('changePassword')}}" method="POST" class="needs-validation" novalidate>
                @csrf 
    
                <div class="row mb-3" style="margin-left: 110px; margin-top:20px;">
                    <div class="form-group mt-1">
                        <label for="name">Nombre de Usuario</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror" required>
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>    
                <div class="row mb-3" style="margin-left: 110px">
                  <div class="form-group mt-1">
                      <label for="password_actual">Clave Actual</label>
                      <input type="password" name="password_actual" class="form-control @error('password_actual') is-invalid @enderror" required>
                        @error('password_actual')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3" style="margin-left: 110px">
                    <div class="form-group mt-1">
                        <label for="new_password ">Nueva Clave</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-5" style="margin-left: 110px">
                    <div class="form-group mt-1">
                        <label for="confirm_password">Confirmar nueva Clave</label>
                        <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"required>
                        @error('confirm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="row text-center mb-4 mt-5">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" id="formSubmit">Guardar Cambios</button>
                        <a href="/" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
</div>
<script>
const mobileScreen = window.matchMedia("(max-width: 990px )");
$(document).ready(function () {
    setTimeout(function () {
        $(".alert.alert-success").fadeOut("slow");
    }, 5000);
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
</script>
@endsection
