<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RoomScheduleController;
use Illuminate\Support\Facades\Route;

// ── Auth ────────────────────────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// ── Admin Area ───────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Pengguna
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');

    // Ruangan & Jadwal
    Route::get('/rooms', [AdminController::class, 'rooms'])->name('rooms');
    Route::patch('/rooms/{room}/toggle', [AdminController::class, 'toggleRoom'])->name('rooms.toggle');
    Route::get('/schedule', [AdminController::class, 'schedule'])->name('schedule');

    // Reservasi & Histori
    Route::get('/reservations', [AdminController::class, 'reservations'])->name('reservations');
    Route::patch('/reservations/{reservation}/approve', [AdminController::class, 'approveReservation'])->name('reservations.approve');
    Route::patch('/reservations/{reservation}/reject', [AdminController::class, 'rejectReservation'])->name('reservations.reject');
    Route::get('/history', [AdminController::class, 'history'])->name('history');
});

// ── Public Pages ─────────────────────────────────────────────────────────
Route::get('/', function () {
    return view('welcome');
})->name('beranda');

Route::get('/layanan-luring', function () {
    return view('layanan.luring');
})->name('layanan.luring');

Route::get('/layanan-daring', function () {
    return view('layanan.daring');
})->name('layanan.daring');

Route::get('/layanan-area-belajar', function () {
    return view('layanan.area-belajar');
})->name('layanan.area-belajar');

Route::get('/jadwal-ruangan', [RoomScheduleController::class, 'index'])->name('jadwal.ruangan');

Route::get('/bantuan', function () {
    return view('bantuan');
})->name('bantuan');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

// ── Room Schedule & Availability APIs ────────────────────────────────────
Route::prefix('api/rooms')->group(function () {
    Route::get('/schedule', [RoomScheduleController::class, 'getSchedule'])->name('api.rooms.schedule');
    Route::get('/availability', [RoomScheduleController::class, 'checkAvailability'])->name('api.rooms.availability');
});
