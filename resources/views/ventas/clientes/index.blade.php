@extends('layouts.app')
@section('content')
    <h1>Lista de Clientes</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('clientes.create') }}">Nuevo Cliente</a>
    <table>
        <tr>
            <th>Nombre</th><th>Email</th><th>Acciones</th>
        </tr>
        @foreach ($clientes as $cliente)
            <tr>
                <td>{{ $cliente->nombres }} {{ $cliente->apellidos }}</td>
                <td>{{ $cliente->email }}</td>
                <td>
                    <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                    <form method="POST" action="{{ route('clientes.destroy', $cliente->id) }}" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection