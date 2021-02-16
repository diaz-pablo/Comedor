<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ImageController;

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
Route::resource('/students', StudentController::class)->names('admin.students');
Route::resource('/menus', MenuController::class)->names('admin.menus');
Route::post('/menus/{menu}/images', [ImageController::class, 'store'])->name('admin.menus.images.store');
