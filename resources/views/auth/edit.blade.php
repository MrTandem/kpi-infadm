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
                        <h1>Registrar administrador</h1>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" action="{{ route('users.update', $user) }}" method="POST">
                            @csrf @method( 'PATCH ')
                            <div class="form-group">
                                <div class='col-sm-10'>
                                    <div class="input-group">
                                        <label class="col-sm-3 control-label">
                                            <strong>Nombre</strong></label>
                                        <input class="form-control" autofocus="autofocus" type="text" name="name"
                                            value="{{ $user->name }}">
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
                                        <label class="col-sm-3 control-label"><strong>Correo</strong></label>
                                        <input id="email" class="form-control" type="email" name="email"
                                            value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>
                            @error('email')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <br>
                            <div class="form-group">
                                <div class='col-sm-10'>
                                    <div class="input-group">
                                        <label class="col-sm-3 control-label">
                                            <strong>Area</strong></label>
                                        <select id="role" class="form-control" name="role">
                                            <option value="{{ $user->role }}">{{ $user->role }}(Actual)</option>
                                            <option value="sistemas">Sistemas</option>
                                            <option value="administracion">Administracion</option>
                                            <option value="finanzas">Finanzas</option>
                                            <option value="mercadotecnia">Marketing</option>
                                            <option value="rh">Recursos Humanos</option>
                                            <option value="SCM">SCM</option>
                                            <option value="trafico">Trafico</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @error('area')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <br>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10 text-center">
                                    <a href="{{ route('adminUser') }}" class="btn btn-primary"><i class="fa fa-reply"></i>
                                        Iniciar Sesion</a>
                                    <button type="submit" class="btn btn-info">Editar usuario</button>
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