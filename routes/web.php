<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard_controller;
use App\Http\Controllers\form_controller;

Route::get('/', [dashboard_controller::class, 'home']);
Route::get('/register', [form_controller::class, 'daftar']);
Route::post('/welcome', [form_controller::class, 'welcome']);