@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Usuario</h1>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="role">Rol</label>
            <select class="form-control" id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="vet">Veterinario</option>
                <option value="user">Usuario</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection