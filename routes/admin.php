<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

Route::resource('/users', UserController::class)->names('admin.users');
