@extends('layouts.app')
@section('content')
    <h1>Editar Departamento</h1>

    <form method="POST" action="{{ route('departamentos.update', $departamento->id) }}">
        @csrf @method('PUT')
        <div class="mb-2"><input name="nombre" value="{{ $departamento->nombre }}" class="form-control"></div>
        <div class="mb-2"><input name="trabajadores" value="{{ $departamento->trabajadores }}" class="form-control"></div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection