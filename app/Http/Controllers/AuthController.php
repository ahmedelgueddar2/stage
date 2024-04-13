<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Display the login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle form submission for login
    // Handle form submission for login
public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication successful
        return redirect()->route('user.index');
    }

    // Authentication failed
    return back()->withErrors(['email' => 'Invalid credentials']);
}

    // Logout the user
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
Route::get('/user', [UserController::class, 'index'])->name('user.index');
