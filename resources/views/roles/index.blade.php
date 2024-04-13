@extends('layouts.app')

@section('content')

<h3>Liste des rôles</h3>

<div class="text-right">
    <a href="{{ route('roles.create') }}" class="btn btn-info mb-2">Ajouter un rôle</a>
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
        @foreach($roles as $role)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $role->nom }}</td>
            <td>{{ $role->description }}</td>
            <td>
                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-dark">Modifier</a>
                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
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
