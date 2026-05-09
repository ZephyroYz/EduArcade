@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Asignar Roles a Usuarios</h1>
    
    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.updateRole') }}" method="POST">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <select name="role[{{ $user->id }}]" class="form-control">
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Usuario</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Actualizar Roles</button>
    </form>
</div>
@endsection
