<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AuthController;
use App\Models\User;

// --- 1. AUTHENTICATION ROUTES ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register Mahasiswa
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// --- 2. SHORTCUT ADMIN (Sesuai permintaan: Tinggal Klik) ---
Route::get('/login-admin', function() {
    $admin = User::where('is_admin', true)->first();
    auth()->login($admin);
    return redirect()->route('tickets.index');
});

// --- 3. ROUTES UTAMA (Harus Login) ---
Route::middleware('auth')->group(function () {
    Route::get('/', function () { return redirect()->route('tickets.index'); });
    
    Route::resource('tickets', TicketController::class);
    Route::post('/tickets/{ticket}/comments', [TicketController::class, 'storeComment'])->name('tickets.comments.store');
    Route::patch('/tickets/{ticket}/status', [TicketController::class, 'updateStatus'])->name('tickets.status.update');
});