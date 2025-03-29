<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PerfilController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'selected_profile_photo' => 'nullable|string|in:icon1.png,icon2.png,icon3.png,icon4.png,icon5.png',
            'current_password' => 'nullable|required_with:new_password|min:6',
            'new_password' => [
                'nullable',
                'min:8',
                'confirmed',
                'regex:/[A-Z]/', // Al menos una mayúscula
                'regex:/[!@#$%^&*(),.?":{}|<>]/' // Al menos un carácter especial
            ],
        ], [
            'new_password.regex' => 'La nueva contraseña debe contener al menos una letra mayúscula y un carácter especial (!@#$%^&*(),.?":{}|<>).',
        ]);

        // Verificar si el usuario quiere cambiar la contraseña
        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'La contraseña actual no es correcta.']);
            }
            
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
        }

        // Manejar la actualización de la foto de perfil
        if ($request->filled('selected_profile_photo')) {
            $user->update([
                'profile_photo' => $request->selected_profile_photo,
            ]);
        }

        // Actualizar nombre y email
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('perfil.edit')->with('success', 'Perfil actualizado correctamente.');
    }
}
