<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\AuthenticatedTokenController;

Route::post('/login', [AuthenticatedTokenController::class, 'store'])
    ->middleware('guest')
    ->name('login');

Route::post('/logout', [AuthenticatedTokenController::class, 'destroy'])
    ->middleware('auth:sanctum')
    ->name('logout');
