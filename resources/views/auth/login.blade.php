@extends('layout')

@section('content')

<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-header" style="background-color: #007BFF; color: #FFFFFF; font-size: 24px; font-weight: bold; text-align: center;">Sistema THERMOTECH</div>
                    <div class="card-body" style="background-color: #FFFFFF;">
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right" style="font-weight: bold;">Correo Electrónico</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger" style="font-weight: bold;">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right" style="font-weight: bold;">Contraseña</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger" style="font-weight: bold;">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <label style="font-weight: bold;">
                                            <input type="checkbox" name="remember"> Recordarme
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-custom" style="font-weight: bold; background-color: #007BFF; color: #FFFFFF;">Iniciar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
