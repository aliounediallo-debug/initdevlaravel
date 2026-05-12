<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\InscripController;
use App\Http\Controllers\AuthController;

    Route::get('/', [AuthController::class, 'login
    Form'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/registerForm', [InscripController::class, 'inscriptionForm'])->name('registerForm');
    Route::post('/inscription', [InscripController::class, 'inscription']);


    Route::get('/accueil', [AccueilController::class,'index'])->name('accueil');
    Route::get('/envoi', function () {
        return view('envoi');
     })->name('send');

    Route::get('/historique', function () {
        return view('historique');
     })->name('historique');
