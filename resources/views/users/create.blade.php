@extends('layouts.app')

@section('content')

<h3>Add User</h3>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
        @error('nom')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="prénom">Prénom :</label>
        <input type="text" class="form-control" id="prénom" name="prénom" value="{{ old('prénom') }}" required>
        @error('prénom')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="telephone">Téléphone :</label>
        <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}">
        @error('telephone')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="login">Login :</label>
        <input type="text" class="form-control" id="login" name="login" value="{{ old('login') }}" required>
        @error('login')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" class="form-control" id="password" name="password" required>
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- Include the role selection field if a default role exists -->
    @if($defaultRole)
        <div class="form-group">
            <label for="roles">Rôle :</label>
            <select class="form-control" id="roles" name="roles[]">
                <option value="{{ $defaultRole->id }}">{{ $defaultRole->name }}</option>
            </select>
        </div>
    @endif
    <button type="submit" class="btn btn-dark">Ajouter</button>
</form>

@endsection
