<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

Route::resource('/students', StudentController::class)->names('admin.students');
