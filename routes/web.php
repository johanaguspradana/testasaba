<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanbakuController;
use App\Http\Controllers\ProductController;
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
Route::get('/index', [BahanbakuController::class,'tampil']);

Route::get('/product', [ProductController::class,'index']);
Route::get('/perhitungan', [ProductController::class,'snak']);
Route::get('/getdataproduct', [ProductController::class,'getdata']);
Route::get('/indexproduct', [ProductController::class,'tampil']);
Route::post('/hitung-snak', [ProductController::class,'hitungSnak']);

// Menampilkan halaman untuk membuat data baru
Route::get('/data/create', [BahanbakuController::class,'create']);

// Menyimpan data baru
Route::post('/data', [BahanbakuController::class,'store']);
Route::post('/product', [ProductController::class,'store']);
// Menampilkan data berdasarkan id
Route::get('/data/{id}', [BahanbakuController::class,'show']);

// Menampilkan halaman untuk mengedit data
Route::get('/data/{id}/edit', [BahanbakuController::class,'edit']);

// Mengupdate data
Route::put('/data/{id}', [BahanbakuController::class,'update']);
Route::put('/product/{id}', [ProductController::class,'update']);

// Menghapus data
Route::delete('/data/{id}', [BahanbakuController::class,'destroy']);
Route::delete('/product/{id}', [ProductController::class,'destroy']);