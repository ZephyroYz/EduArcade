<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('perfil.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::delete('public/profile-photos/' . $user->profile_photo);
            }

            $imageName = time() . '.' . $request->profile_photo->extension();
            $request->profile_photo->storeAs('profile-photos', $imageName, 'public');

            $user->update([
                'profile_photo' => $imageName,
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
