<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;

class ChangePasswordController extends Controller
{
    // Método para mostrar el formulario de cambio de contraseña
    public function showChangePasswordForm()
    {
        return view('auth.change');
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = auth()->user();

        // Verificar la contraseña actual
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return back()->with('error', 'La contraseña actual no es válida.');
        }

        // Verificar si el usuario tenía un rol anterior almacenado en la sesión
        $previousRole = $request->session()->get('previous_role');

        // Cambiar la contraseña
        $user->password = Hash::make($request->input('password'));
        $user->save();

        // Restaurar el rol anterior del usuario
        if ($previousRole) {
            $user->update(['role' => $previousRole]);
            $request->session()->forget('previous_role'); // Eliminar el rol anterior de la sesión
        }

        return redirect()->route('home')->with('status', 'La contraseña se cambió con éxito.');
    }

    public function showResetPasswordForm($id)
    {
        $user = User::findOrFail($id);
        return view('auth.reset', ['user' => $user]);
    }

    public function resetPassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::findOrFail($id);

        // Cambiar la contraseña
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('adminUser')->with('status', 'La contraseña del usuario se restableció con éxito.');
    }

    public function adminstrationUser(Request $request)
    {
        $buscar = $request->buscar;
        $users = User::Where('user_name', 'LIKE', "%$buscar%")
            ->orWhere('role', 'LIKE', "%$buscar%")
            ->paginate(100);

        return view('auth.index', ['users' => $users]);
    }
}