<h2>Editar Producto</h2>

<form action="{{ route('productos.update', $producto->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ $producto->nombre }}"><br>

    <label>Departamento:</label>
    <input type="text" name="departamento" value="{{ $producto->departamento }}"><br>

    <label>Precio:</label>
    <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}"><br>

    <label>Cantidad:</label>
    <input type="number" name="cantidad" value="{{ $producto->cantidad }}"><br>

    <button type="submit">Actualizar</button>
</form>