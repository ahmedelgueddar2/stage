@extends('layouts.app')

@section('content')

<h3>Liste des utilisateurs</h3>
<div class="text-right">
    <a href="{{ route('users.create') }}" class="btn btn-info mb-2">Add User</a>
</div>
<table class="table table-bordered table-inverse table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Login</th>
            <th>Téléphone</th>
            <th>Roles</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $user->nom }}</td>
            <td>{{ $user->prénom}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->login}}</td>
            <td>{{$user->telephone}}</td>
            <td>
                @foreach($user->roles as $role)
                {{ $role->name }}{{ !$loop->last ? ' , ' : '' }}
                @endforeach
            </td>
            <td>
                <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-dark">View</a>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-dark">Edit</a>

                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> 

@endsection
