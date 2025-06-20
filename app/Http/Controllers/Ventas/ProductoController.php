<?php

namespace App\Http\Controllers\Ventas;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::where('estado', 1)->get();
        return view('ventas.productos.index', compact('productos'));
    }


    public function create()
    {
        return view('ventas.productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'departamento' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0'
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto registrado.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('ventas.productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'departamento' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0'
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->estado = 0;
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto desactivado correctamente.');
    }

}