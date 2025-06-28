@extends('layouts.app')
@section('title', 'Registrar')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Registrar usuario</h1>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class='col-sm-10'>
                                    <div class="input-group">
                                        <label class="col-sm-3 control-label">
                                            <strong>Nombre</strong></label>
                                        <input class="form-control" autofocus="autofocus" type="text" name="name"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>
                            </div>
                            @error('name')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <br>
                            <div class="form-group">
                                <div class='col-sm-10'>
                                    <div class="input-group">
                                        <label class="col-sm-3 control-label"><strong>Usuario</strong></label>
                                        <input id="user_name" class="form-control" type="text" name="user_name"
                                            value="{{ old('user_name') }}">
                                    </div>
                                </div>
                            </div>
                            @error('user_name')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <br>
                            <div class="form-group">
                                <div class='col-sm-10'>
                                    <div class="input-group">
                                        <label class="col-sm-3 control-label"><strong>Correo</strong></label>
                                        <input id="email" class="form-control" type="email" name="email"
                                            value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>
                            @error('email')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $('#user_name').on('input', function() {
                                        var username = $(this).val();
                                        var domain = '@dominio.com';
                                        var email = username + domain;
                                        $('#email').val(email);
                                    });
                                });
                            </script>
                            <br>
                            <div class="form-group">
                                <div class='col-sm-10'>
                                    <div class="input-group">
                                        <label class="col-sm-3 control-label">
                                            <strong>Area</strong></label>
                                        <select id="role" class="form-control" name="role">
                                            <option value="administrador">Administrador</option>
                                            <option value="cliente">Clientes</option>
                                            <option value="proveedor">Proveedor</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @error('area')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <br>
                            <div class="form-group">
                                <div class='col-sm-10'>
                                    <div class="input-group">
                                        <label class="col-sm-3 control-label">
                                            <strong>Contraseña</strong></label>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                            </div>
                            @error('password')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <br>
                            <div class="form-group">
                                <div class='col-sm-10'>
                                    <div class="input-group">
                                        <label class="col-sm-3 control-label">
                                            <strong>Confirmar Contraseña</strong></label>
                                        <input class="form-control" type="password" name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                            @error('password_confirmation')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <br>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10 text-center">
                                    <a href="{{ route('login') }}" class="btn btn-primary"><i class="fa fa-reply"></i>
                                        Iniciar Sesion</a>
                                    <button type="submit" class="btn btn-info">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection