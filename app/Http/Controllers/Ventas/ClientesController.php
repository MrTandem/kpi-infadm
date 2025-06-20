<?php

namespace App\Http\Controllers\Ventas;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::where('status', 1)->get();
        return view('ventas.clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('ventas.clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'edad' => 'required|integer',
            'sexo' => 'required|string',
            'email' => 'required|email|unique:clientes,email',
            'telefono' => 'required|integer',
            'rfc' => 'required|string|size:13|unique:clientes,rfc',
            'direccion' => 'required|string',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('ventas.clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'edad' => 'required|integer',
            'sexo' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'required|integer',
            'rfc' => 'required|string|size:13',
            'direccion' => 'required|string',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update(['status' => 0]);

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }
}