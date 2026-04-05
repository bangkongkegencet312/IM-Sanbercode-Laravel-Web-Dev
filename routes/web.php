<?php

use App\Http\Controllers\category_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard_controller;
use App\Http\Controllers\form_controller;


Route::get('/', [dashboard_controller::class, 'home']);
Route::get('/register', [form_controller::class, 'daftar']);
Route::post('/welcome', [form_controller::class, 'welcome']);

// Route::get('/master', function () {
//     return view ('layouts.master');
    
// });

// CRUD Category
// C +> Create data
Route::get('/category/create',[category_controller::class, 'create']);
Route::post('/category',[category_controller::class, 'store']);

// // R -> Read Data
Route::get('/category',[category_controller::class, 'index']);
Route::get('/category/{id}',[category_controller::class, 'show']);

// U => Uodate Data
Route::get('/category/{id}/edit',[category_controller::class, 'edit']);
Route::put('/category/{id}',[category_controller::class, 'update']);
