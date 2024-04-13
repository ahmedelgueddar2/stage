<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les utilisateurs avec leurs rôles et les permissions associées
        $users = User::with('roles.permissions')->get();

        // Passer les données à la vue
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Récupérez le rôle par défaut, par exemple en le récupérant depuis la base de données
        $defaultRole = Role::where('name', 'default_role')->first(); // Adapté à votre cas d'utilisation

        // Passer la variable $defaultRole à la vue
        return view('users.create', ['defaultRole' => $defaultRole]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prénom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'telephone' => 'nullable|string|max:20',
            'login' => 'required|string|max:255|unique:users,login',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]+$/',
        ]);

        // Créer un nouvel utilisateur
        $user = User::create([
            'nom' => $request->input('name'),
            'prénom' => $request->input('prénom'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'login' => $request->input('login'),
            'password' => bcrypt($request->input('password')), // Assurez-vous de hasher le mot de passe
        ]);

        // Attribuer un rôle par défaut à l'utilisateur
        $defaultRole = Role::where('nom', 'default_role')->first();

        if ($defaultRole) {
            $user->roles()->attach($defaultRole);
        }

        return redirect()->route('users.index')->with('success', 'Utilisateur ajouté avec succès!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // Récupérer tous les rôles pour passer à la vue
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prénom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'telephone' => 'nullable|string|max:20',
            'login' => 'required|string|max:255|unique:users,login,' . $user->id,
            'password' => 'nullable|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]+$/',
        ]);

        // Mettre à jour les informations de l'utilisateur
        $user->update([
            'nom' => $request->input('nom'),
            'prénom' => $request->input('prénom'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'login' => $request->input('login'),
        ]);

        // Vérifier si un nouveau mot de passe est fourni
        if ($request->has('password')) {
            $user->update([
                'password' => bcrypt($request->input('password')),
            ]);
        }

        // Mettre à jour les rôles de l'utilisateur
        $user->roles()->sync($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès!');
    }
}
