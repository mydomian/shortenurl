<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UrlShorterController;
use Illuminate\Support\Facades\Route;


// user route
Route::get('/', fn() => redirect()->route('login'));
Route::match(['get','post'],'/login', [AuthController::class,'login'])->name('login');
Route::middleware(['auth'])->group(function () {
    Route::resource('short-urls',UrlShorterController::class);
    Route::get('/{shortUrl}', [UrlShorterController::class, 'redirect'])->name('shortUrl.redirect');
});


