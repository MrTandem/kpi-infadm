@extends('layouts.app')
@section('content')
    <h1>Crear Cliente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('clientes.store') }}">
        @csrf
        <input name="nombres" placeholder="Nombres">
        <input name="apellidos" placeholder="Apellidos">
        <input name="edad" type="number" placeholder="Edad">
        <input name="sexo" placeholder="Sexo">
        <input name="email" placeholder="Email">
        <input name="telefono" type="number" placeholder="Teléfono">
        <input name="rfc" placeholder="RFC">
        <input name="direccion" placeholder="Dirección">
        <button type="submit">Guardar</button>
    </form>
@endsection
