@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mascotas</h1>
    <a href="{{ route('pets.create') }}" class="btn btn-primary">Registrar Mascota</a>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Raza</th>
                <th>Fecha de Nacimiento</th>
                <th>Dueño</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pets as $pet)
            <tr>
                <td>{{ $pet->name }}</td>
                <td>{{ $pet->species }}</td>
                <td>{{ $pet->breed }}</td>
                <td>{{ $pet->birth_date }}</td>
                <td>{{ $pet->owner->name }}</td>
                <td>
                    <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection