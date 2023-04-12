<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDataMahasiswaController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;



Route::get('/', [LandingPageController::class, 'index']);
Route::get('/daftar', [RegisterController::class, 'index']);
Route::post('/daftar', [RegisterController::class, 'store']);
Route::get('/masuk', [LoginController::class, 'index'])->name('login');
Route::post('/masuk', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->middleware('auth');
Route::get('/pendaftaran/cetak/{registration_id}', [PendaftaranController::class, 'print'])->middleware('auth');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->middleware('auth');
Route::post('/pendaftaran/update', [PendaftaranController::class, 'update'])->middleware('auth');
Route::get('/admin', [AdminDashboardController::class, 'index'])->middleware('auth');
Route::get('/admin/settings', [AdminSettingsController::class, 'index'])->middleware('auth');
Route::post('/admin/settings', [AdminSettingsController::class, 'update'])->middleware('auth');
Route::get('/admin/data-mahasiswa', [AdminDataMahasiswaController::class, 'index'])->middleware('auth');
Route::get('/admin/data-mahasiswa/export', [AdminDataMahasiswaController::class, 'exportExcel'])->middleware('auth');
Route::get('/admin/data-mahasiswa/{registration_id}', [AdminDataMahasiswaController::class, 'index'])->middleware('auth');
Route::post('/admin/data-mahasiswa/{registration_id}', [AdminDataMahasiswaController::class, 'update'])->middleware('auth');
Route::get('/admin/data-mahasiswa/{registration_id}/hapus', [AdminDataMahasiswaController::class, 'delete'])->middleware('auth');
Route::get('/admin/users', [AdminUsersController::class, 'index'])->middleware('auth');
Route::get('/admin/users/{id}', [AdminUsersController::class, 'index'])->middleware('auth');
Route::get('/admin/users/{id}/hapus', [AdminUsersController::class, 'delete'])->middleware('auth');
Route::post('/admin/users/{id}', [AdminUsersController::class, 'update'])->middleware('auth');
