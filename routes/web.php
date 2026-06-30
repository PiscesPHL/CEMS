<?php

use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController; // <-- Added from Bootcamp
use App\Http\Controllers\StudentController;   // <-- Added from Bootcamp
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// -----------------------------------------------------
// 1. Public Routes
// -----------------------------------------------------
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// -----------------------------------------------------
// 2. Your Original Authenticated Routes
// -----------------------------------------------------
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth:web'])->group(function () {
    Route::get('users-account/{id}/edit', [UserController::class, 'editAccount']);
    Route::put('users-account/{id}', [UserController::class, 'updateAccount']);
   
    Route::resource('users', UserController::class);
    Route::resource('organizations', OrganizationController::class);
}); 

// -----------------------------------------------------
// 3. Bootcamp Routes: General Authenticated Users
// -----------------------------------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/students', [StudentController::class, 'index'])
        ->name('students.index');
});

// -----------------------------------------------------
// 4. Bootcamp Routes: Admins Only
// -----------------------------------------------------
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