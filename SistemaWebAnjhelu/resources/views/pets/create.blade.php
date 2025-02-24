@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Mascota</h1>
    <form method="POST" action="{{ route('pets.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="species">Especie</label>
            <input type="text" class="form-control" id="species" name="species" required>
        </div>
        <div class="form-group">
            <label for="breed">Raza</label>
            <input type="text" class="form-control" id="breed" name="breed">
        </div>
        <div class="form-group">
            <label for="birth_date">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date">
        </div>
        <div class="form-group">
            <label for="owner_id">Dueño</label>
            <select class="form-control" id="owner_id" name="owner_id" required>
                @foreach($owners as $owner)
                    <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
@endsection