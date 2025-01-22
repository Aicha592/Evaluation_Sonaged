<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvaluationController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/liste', [UserController::class, 'listeUtilisateurs'])->name('liste');
Route::get('/liste/{id}', [UserController::class, 'detail'])->name('detail');

// Authentification
// Routes Connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes Inscription
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Protégez vos routes avec le middleware auth
Route::middleware('auth')->group(function () {
    Route::GET('/index', [AuthController::class, 'index'])->name('index');
    Route::GET('/form/{id}', [AuthController::class, 'formCollaborator'])->name(name: 'form');
    Route::POST('/resultat', [AuthController::class, 'Calcul'])->name('resultat');
});