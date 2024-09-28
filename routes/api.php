<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShorterController;

// Note: how to use this api
// ------------------------
// 1. get request return this user all data with shorten url
// 2. post request save return this user single data with shorten url
// post data body format
// ------------------------
// user_id: authentica id
// url: https://www.lipsum.com/

Route::match(['get','post'],'/short-urls-generate',[UrlShorterController::class,'generateUrl'])->name('shortUrlGen');
