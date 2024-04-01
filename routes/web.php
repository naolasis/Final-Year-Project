<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommitteeHeadController;
use App\Http\Controllers\CommitteeMemberController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\StudentController;

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/committee_head', function () {
    return view('committee_head.dashboard');
});

Route::get('/admin_dashboard',[AdminController::class, 'dashboard'])->name('admin_dashboard');
Route::get('/manage_committee', [AdminController::class, 'manageCommittee'])->name('manage_committee');


Route::get('/committee_head_dashboard', [CommitteeHeadController::class, 'dashboard'])->name('committee_head_dashboard');


Route::get('/committee_member_dashboard', [CommitteeMemberController::class, 'dashboard'])->name('committee_member_dashboard');


Route::get('/advisor_dashboard', [AdvisorController::class , 'dashboard'])->name('advisor_dashboard');


Route::get('/student_dashboard', [StudentController::class , 'dashboard'])->name('student_dashboard');