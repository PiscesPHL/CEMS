<?php

use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\StudentController;   
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public Route
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Auth::routes();

Route::get('/home', function () {
    return redirect()->route('dashboard');
})->name('home');

Route::middleware(['auth:web'])->group(function () {
    Route::get('users-account/{id}/edit', [UserController::class, 'editAccount']);
    Route::put('users-account/{id}', [UserController::class, 'updateAccount']);
   
    Route::resource('users', UserController::class);
    Route::resource('organizations', OrganizationController::class);
}); 

// -----------------------------------------------------------------
// Bootcamp Routes from your slide
// -----------------------------------------------------------------

// Group 1: General Authenticated Users (auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/students', [StudentController::class, 'index'])
        ->name('students.index');
});

// Group 2: Admins Only (auth + role:admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/students/create', [StudentController::class, 'create'])
        ->name('students.create');
        
    Route::post('/students', [StudentController::class, 'store'])
        ->name('students.store');
        
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])
        ->name('students.edit');
        
    Route::put('/students/{student}', [StudentController::class, 'update'])
        ->name('students.update');
        
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])
        ->name('students.destroy');
}); 