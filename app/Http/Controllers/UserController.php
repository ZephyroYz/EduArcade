<?php

// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Mostrar el formulario de asignación de roles
    public function showAssignRolesForm()
    {
        // Obtener todos los usuarios
        $users = User::all();
        return view('admin.assign_roles', compact('users'));
    }

    // Actualizar los roles de los usuarios
    public function updateUserRoles(Request $request)
    {
        // Validar los roles que vienen del formulario
        $request->validate([
            'role' => 'required|array',
            'role.*' => 'in:user,admin', // Asegurarse de que los roles sean válidos
        ]);

        // Actualizar los roles de cada usuario
        foreach ($request->role as $userId => $role) {
            $user = User::find($userId);
            if ($user) {
                $user->role = $role; // Asignar el rol
                $user->save(); // Guardar los cambios
            }
        }

        return redirect()->route('admin.assignRoles')->with('success', 'Roles actualizados exitosamente');
    }
}
