@extends('layouts.app')
@section('content')
    <h1>Editar Cliente</h1>

    <form method="POST" action="{{ route('clientes.update', $cliente->id) }}">
        @csrf @method('PUT')
        <div class="mb-2"><input name="nombres" value="{{ $cliente->nombres }}" class="form-control"></div>
        <div class="mb-2"><input name="apellidos" value="{{ $cliente->apellidos }}" class="form-control"></div>
        <div class="mb-2"><input name="edad" type="number" value="{{ $cliente->edad }}" class="form-control"></div>
        <div class="mb-2"><input name="sexo" value="{{ $cliente->sexo }}" class="form-control"></div>
        <div class="mb-2"><input name="email" value="{{ $cliente->email }}" class="form-control"></div>
        <div class="mb-2"><input name="telefono" value="{{ $cliente->telefono }}" class="form-control"></div>
        <div class="mb-2"><input name="rfc" value="{{ $cliente->rfc }}" class="form-control"></div>
        <div class="mb-2"><input name="direccion" value="{{ $cliente->direccion }}" class="form-control"></div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection