<h2>Crear nuevo producto</h2>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('productos.store') }}" method="POST">
    @csrf

    <label>Nombre:</label>
    <input type="text" name="nombre"><br>

    <label>Departamento:</label>
    <input type="text" name="departamento"><br>

    <label>Precio:</label>
    <input type="number" step="0.01" name="precio"><br>

    <label>Cantidad:</label>
    <input type="number" name="cantidad"><br>

    <button type="submit">Guardar</button>
</form>
