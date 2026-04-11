<?php

use App\Http\Controllers\category_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard_controller;
use App\Http\Controllers\form_controller;
use App\Http\Controllers\products_controller;


// Main Controller //
Route::get('/auth_login', [dashboard_controller::class, 'login']);
Route::get('/auth_create', [dashboard_controller::class, 'create']);

Route::get('/', [dashboard_controller::class, 'home']);
Route::get('/register', [form_controller::class, 'daftar']);
Route::post('/welcome', [form_controller::class, 'welcome']);

// Route::get('/master', function () {
//     return view ('layouts.master');
    
// });

// Category Controller //

// CRUD Category
// C -> Create data
Route::get('/category/create',[category_controller::class, 'create']);
Route::post('/category',[category_controller::class, 'store']);

// // R -> Read Data
Route::get('/category',[category_controller::class, 'index']);
Route::get('/category/{id}',[category_controller::class, 'show']);

// U => Uodate Data
Route::get('/category/{id}/edit',[category_controller::class, 'edit']);
Route::put('/category/{id}',[category_controller::class, 'update']);

// D => Delete Data
Route::delete('/category/{id}',[category_controller::class, 'destroy']);

// category controller //
// C -> Create Data
Route::get('/product/create',[products_controller::class, 'create']);
Route::post('/product',[products_controller::class, 'store']);

// R -> Read Data
Route::get('/product',[products_controller::class, 'index']);
Route::get('/product/{id}',[products_controller::class, 'show']);

// U -> Update Data
Route::get('/product/{id}/edit',[products_controller::class, 'edit']);
Route::put('/product/{id}',[products_controller::class, 'update']);

// D -> Delete Data
Route::delete('/product/{id}',[products_controller::class, 'destroy']);


