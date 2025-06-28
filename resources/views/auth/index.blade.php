@extends('layouts.app')

@section('seccion', 'Administracion de usuarios')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-sm-3">
                <form action="{{ route('adminUser') }}" method="GET" class="">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Buscar por nombre" name="buscar">
                        <button class="btn btn-outline-info" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        @if (isset($users) && count($users) > 0)
            <table class="table table-striped table-bordered border-success">
                <thead>
                    <tr>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Usuario</th>
                        <th class="text-center">Area</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Editar</th>
                        <th class="text-center">Resetear <br> Password</th>
                    </tr>
                </thead>
                @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->user_name }}</td>
                        <td class="text-center">{{ $user->role }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center"><a class="btn btn-warning" href="{{ route('users.edit', $user->id) }}"><i
                                    class="fa-solid fa-pen-to-square"></i></a></td>
                        <td class="text-center"><a class="btn btn-danger"
                                href="{{ route('show_reset_password_form', $user->id) }}"><i class="fa-solid fa-key"></i></a></td>
                    </tr>
                @endforeach
            </table>
            <div class="card-body">
                {{ $users->links() }}
            </div>
        @else
            <p>No se encontraron registros</p>
        @endif

    </div>
@endsection