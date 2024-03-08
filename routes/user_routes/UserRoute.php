<?php

namespace Route;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::post('user/login', [UserController::class, 'login']);
Route::post('user/signup', [UserController::class, 'signup']);
