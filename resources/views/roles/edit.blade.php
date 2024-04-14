@extends('layouts.app')

@section('content')

<h3>Modifier un rôle</h3>

<form action="{{ route('roles.update', $role->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{ $role->name }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" required>{{ $role->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

@endsection
