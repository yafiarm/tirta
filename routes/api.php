<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PencatatanMeterController;
use App\Http\Controllers\TagihanController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // A. Khusus petugas lapangan
    Route::middleware('role:petugas')->group(function () {
        Route::get('/warga', [WargaController::class, 'index']);
        Route::post('/warga', [WargaController::class, 'store']);
        Route::post('/pencatatan-meter', [PencatatanMeterController::class, 'store']);
    });

    // B. Warga & petugas
    Route::middleware('role:petugas,warga')->group(function () {
        Route::get('/tagihan', [TagihanController::class, 'index']);
        Route::patch('/tagihan/{id}/bayar', [TagihanController::class, 'bayar']);
    });
});