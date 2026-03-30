<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Models\Book; // tambahkan ini

Route::get('/', [AuthController::class, 'showLogin'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/home', function () {
        $books = Book::latest()->take(4)->get(); // ambil 4 buku terbaru
        return view('home', compact('books')); // kirim ke home.blade.php
    })->name('home');

    Route::resource('books', BookController::class);

});