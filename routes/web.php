<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    return view('welcome');
});


Route::post('/shorten', [UrlController::class, 'store'])->name('shorten');
Route::get('/{shortened}', [UrlController::class, 'redirect'])->name('redirect');