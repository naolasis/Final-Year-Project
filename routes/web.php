<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ManageCommitteeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});
Route::resource('/manage_committee',ManageCommitteeController::class);

Route::get('/dashboard',AdminDashboardController::class)->name('dashboard');
