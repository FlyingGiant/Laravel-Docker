<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return 'HELLO WORLD';
});
Route::resource('users', UserController::class);