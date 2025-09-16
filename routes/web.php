<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ArsipController;

Route::resource('arsip', ArsipController::class);
Route::resource('kategori', KategoriController::class)->except(['show']);
Route::view('/about', 'about');