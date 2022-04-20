<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MessageController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Rutas
Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
Route::post('messages', [MessageController::class, 'store'])->name('messages.store');