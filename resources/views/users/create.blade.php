@extends('layouts.app')

@section('content')

<h3>Ajouter un utilisateur</h3>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="form-group">
        <label for="prénom">Prénom :</label>
        <input type="text" class="form-control" id="prénom" name="prénom" required>
    </div>
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="telephone">Téléphone :</label>
        <input type="text" class="form-control" id="telephone" name="telephone">
    </div>
    <div class="form-group">
        <label for="login">Login :</label>
        <input type="text" class="form-control" id="login" name="login" required>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" class="form-control" id="password" name="password" required>
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
