<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanbakuController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Menampilkan data
Route::post('/calculate-snacks', [BahanbakuController::class,'calculateSnacks']);
Route::get('/data', [BahanbakuController::class,'index']);
Route::get('/getdata', [BahanbakuController::class,'getdata']);
Route::get('/tampil', [BahanbakuController::class,'tampil']);

// Menampilkan halaman untuk membuat data baru
Route::get('/data/create', [BahanbakuController::class,'create']);

// Menyimpan data baru
Route::post('/data', [BahanbakuController::class,'store']);

// Menampilkan data berdasarkan id
Route::get('/data/{id}', [BahanbakuController::class,'show']);

// Menampilkan halaman untuk mengedit data
Route::get('/data/{id}/edit', [BahanbakuController::class,'edit']);

// Mengupdate data
Route::put('/data/{id}', [BahanbakuController::class,'update']);

// Menghapus data
Route::delete('/data/{id}', [BahanbakuController::class,'destroy']);