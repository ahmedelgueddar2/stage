@extends('layouts.app')

@section('content')


<h3>Show User</h3>



<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Nom</th>
                    <td>{{ $user->nom }}</td>
                </tr>
                <tr>
                    <th scope="row">Prénom</th>
                    <td>{{ $user->prénom }}</td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th scope="row">Téléphone</th>
                    <td>{{ $user->telephone }}</td>
                </tr>
                <tr>
                    <th scope="row">Login</th>
                    <td>{{ $user->login }}</td>
                </tr>
                <tr>
                    <th scope="row">Rôle(s)</th>
                    <td>
                        
                           
                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
