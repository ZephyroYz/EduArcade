<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    ]);

    if ($request->hasFile('profile_photo')) {
        // Eliminar la foto anterior si existe
        if ($user->profile_photo) {
            Storage::delete('public/profile-photos/' . $user->profile_photo);
        }
    
        // Guardar la nueva foto usando el disco 'public'
        $imageName = time() . '.' . $request->profile_photo->extension();
        $storedFilePath = $request->profile_photo->storeAs('profile-photos', $imageName, 'public');
    
        // Actualizar el perfil con el nuevo nombre de archivo
        $user->update([
            'profile_photo' => $imageName,
        ]);
    }
    
    
    

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return redirect()->route('perfil.edit')->with('success', 'Perfil actualizado correctamente.');
}

}