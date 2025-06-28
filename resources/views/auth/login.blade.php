@extends('layouts.app')
@section('title', 'Iniciar Sesion')

@section('content')

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <script>
        setTimeout(function() {
            $(".alert").alert('close');
        }, 3000);
    </script>
    <div class="conteiner">
        <div class="login-box">
            <h1>Iniciar Sesion</h1>
            <form class="form-horizontal" role="form" action="{{ route('login') }}" method="POST">
                @csrf
                <!-- USERNAME INPUT -->
                <label for="username">Usuario</label>
                <input type="text" name="user_name" placeholder="Ingrese su usuario">
                <!-- PASSWORD INPUT -->
                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="Ingrese su contraseña">
                @error('user_name')
                    <small style="color: red">{{ $message }}</small>
                @enderror
                <center>
                    <button type="submit" class="btn btn-success">Iniciar Sesion</button>
                </center>

            </form>
        </div>
    </div>
@endsection