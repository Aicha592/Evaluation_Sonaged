<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
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

// Route protégée
Route::middleware('auth')->group(function () {
    Route::GET('/', [AuthController::class, 'index'])->name('index');
});

// Routes administrateur protégées
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::GET('/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::GET('/form/{id}', [AuthController::class, 'formCollaborator'])->name('form');
    Route::POST('/resultat', [AuthController::class, 'Calcul'])->name('resultat');
    Route::get('/export-pdf/{id}', [UserController::class, 'exportPDF'])->name('export.pdf');
    Route::get('/detail/{id}', [UserController::class, 'detail']);
    Route::get('/admin/utilisateurs', [AuthController::class, 'listeUtilisateurs'])->name('admin.utilisateurs');
});
