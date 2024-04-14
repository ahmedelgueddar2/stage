@extends('layouts.app')

@section('content')

<h3>Modifier une permission</h3>

<form action="{{ route('permissions.update', $permission->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{ $permission->name }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" required>{{ $permission->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

@endsection
