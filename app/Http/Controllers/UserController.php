<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all users with their roles and associated permissions
        $users = User::with('roles.permissions')->get();

        // Pass the data to the view
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve the default role, for example by fetching it from the database
        $defaultRole = Role::where('name', 'default_role')->first(); // Adapted to your use case

        // Pass the $defaultRole variable to the view
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

        // Create a new user
        $user = User::create([
            'nom' => $request->input('nom'),
            'prénom' => $request->input('prénom'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'login' => $request->input('login'),
            'password' => Hash::make($request->input('password')), // Make sure to hash the password
        ]);

        // Assign a default role to the user
        $defaultRole = Role::where('name', 'default_role')->first();

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
        // Retrieve all roles to pass to the view
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

        // Update user information
        $user->update([
            'nom' => $request->input('nom'),
            'prénom' => $request->input('prénom'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'login' => $request->input('login'),
        ]);

        // Check if a new password is provided
        if ($request->has('password')) {
            $user->update([
                'password' => Hash::make($request->input('password')),
            ]);
        }

        // Update user roles
        $user->roles()->sync($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès!');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
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
