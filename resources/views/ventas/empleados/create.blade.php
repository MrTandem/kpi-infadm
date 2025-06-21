@extends('layouts.app')
@section('content')
    <h1>Crear Departamento</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('departamentos.store') }}">
        @csrf
        <input name="nombre" placeholder="nombre">
        <input name="trabajadores" placeholder="trabajadores">
        <button type="submit">Guardar</button>
    </form>
@endsection
