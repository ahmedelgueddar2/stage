@extends('layouts.app')

@section('content')

<h3>Liste des permissions</h3>

<div class="text-right">
    <a href="{{ route('permissions.create') }}" class="btn btn-info mb-2">Ajouter une permission</a>
</div>

<table class="table table-bordered table-inverse table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($permissions as $permission)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $permission->nom }}</td>
            <td>{{ $permission->description }}</td>
            <td>
                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-dark">Modifier</a>
                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
