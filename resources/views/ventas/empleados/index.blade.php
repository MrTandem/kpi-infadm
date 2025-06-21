@extends('layouts.app')
@section('content')
    <h1>Lista de Empleados</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('empleados.create') }}">Nuevo Empleado</a>
    <table>
        <tr>
            <th>Nombre</th><th>Numero de trabajadores</th><th>Acciones</th>
        </tr>
        @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado->nombres }} {{ $empleado->apellidos }}</td>
                <td>{{ $empleado->RFC }}</td>
                <td>
                    <a href="{{ route('empleados.edit', $empleado->id) }}">Editar</a>
                    <form method="POST" action="{{ route('empleados.destroy', $empleado->id) }}" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection