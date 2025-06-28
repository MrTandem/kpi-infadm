<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'user_name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Intenta autenticar al usuario
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'user_name' => 'Error al iniciar sesión',
            ]);
        }

        /* Verifica si el usuario necesita cambiar la contraseña
        $user = Auth::user();
        $user->updated_at;
        $expirationDays = 60; // Cambia esto al número de días de expiración que desees
        $daysSinceUpdate = -1 * (now()->diffInDays($user->updated_at, false));

        if ($daysSinceUpdate >= $expirationDays) {
            return redirect()->route('password')
                ->with('info', 'Tu contraseña ha expirado, por favor cambiala.');
        } else {

            $request->session()->regenerate();

            return redirect()->intended()
                ->with('status', 'Bienvenido');
        } */
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login');
    }
}