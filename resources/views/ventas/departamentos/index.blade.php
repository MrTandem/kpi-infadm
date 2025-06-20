@extends('layouts.app')
@section('content')
    <h1>Lista de Departamentos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('departamentos.create') }}">Nuevo Departamento</a>
    <table border="1">
        <tr>
            <th>Nombre</th><th>Numero de trabajadores</th><th>Acciones</th>
        </tr>
        @foreach ($departamentos as $departamento)
            <tr>
                <td>{{ $departamento->nombre }}</td>
                <td>{{ $departamento->trabajadores }}</td>
                <td>
                    <a href="{{ route('departamentos.edit', $departamento->id) }}">Editar</a>
                    <form method="POST" action="{{ route('departamentos.destroy', $departamento->id) }}" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection