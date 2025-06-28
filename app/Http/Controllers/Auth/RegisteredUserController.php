<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'max:255']
        ]);

        try {
            User::create([
                'name' => $request->name,
                'user_name' => $request->user_name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);
        } catch (\Illuminate\Database\QueryException $exception) {
            if ($exception->errorInfo[1] === 1062) { // Código de error para duplicados en MySQL
                return redirect()->back()->withInput()->withErrors([
                    'user_name' => 'El nombre de usuario ya está en uso. Por favor, elige otro.'
                ]);
            }
            throw $exception; // Lanzar la excepción si no es un error de duplicado
        }

        return redirect()->route('login')->with('status', 'Registro exitoso');
    }

    public function edit(User $user)
    {
        return view('auth.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required', 'string', 'max:255']
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('adminUser')->with('status', 'Registro actualizado exitosamente');
    }
}