<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
Route::get('/', [HomeController::class , 'index']);
Route::get('/register_hunter', [AuthController::class , 'showRegisterHunter']);
Route::get('/register_entreprise', [AuthController::class , 'showRegisterentreprise']);
