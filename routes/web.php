<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::resource('users', UserController::class)->except(['show']);


// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Resourceful routes for user management
Route::resource('users', UserController::class);

// Resourceful routes for role management
Route::resource('roles', RoleController::class)->except(['show']);

// Resourceful routes for permission management
Route::resource('permissions', PermissionController::class)->except(['show']);

// Default route for user dashboard or profile
Route::get('/user', [UserController::class, 'index'])->name('user.index');
