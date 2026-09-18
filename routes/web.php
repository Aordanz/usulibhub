<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
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
});

use App\Http\Controllers\RoomScheduleController;

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
