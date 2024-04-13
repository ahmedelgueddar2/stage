@extends('layouts.app')

@section('content')

<h3>Edit User</h3>

<form action="{{ route('users.update',$user->id) }}" method="POST">
    @csrf
    @method ('PUT')
    
    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" value="{{$user->nom}}" id="nom" name="nom" required>
        @error('nom')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="prenom">Prénom:</label>
        <input type="text" class="form-control" value="{{$user->prénom}}" id="prenom" name="prenom" required>
        @error('prenom')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" value="{{$user->email}}" id="email" name="email" required>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="telephone">Téléphone:</label>
        <input type="text" class="form-control" value="{{$user->telephone}}" id="telephone" name="telephone">
        @error('telephone')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="login">Login:</label>
        <input type="text" class="form-control" value="{{$user->login}}" id="login" name="login" required>
        @error('login')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Mot de passe:</label>
        <input type="password" class="form-control" id="password" name="password">
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="roles">Rôles:</label>
        <select class="form-control" id="roles" name="roles[]" multiple>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $role->name }}</option>
            @endforeach
        </select>
        @error('roles')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

@endsection
