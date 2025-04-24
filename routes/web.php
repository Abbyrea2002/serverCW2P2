<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/items', ItemsController::class);