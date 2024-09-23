<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;


//The main view of this app is the welcome view but i changed it's blade elemens.

Route::get('/', function () {return view('welcome');});

//Here the post and get routes are for the same view which is the welcome 

Route::post('/shorten', [UrlController::class, 'store'])->name('shorten');
Route::get('/{shortened}', [UrlController::class, 'redirect'])->name('redirect');
