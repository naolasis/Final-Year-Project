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


Route::get('/admin',[AdminController::class, 'dashboard'])->name('admin');
Route::get('/manage_committee', [AdminController::class, 'manageCommittee'])->name('manage_committee');


Route::get('/committee_head', [CommitteeHeadController::class, 'dashboard'])->name('committee_head');


Route::get('/committee_member', [CommitteeMemberController::class, 'dashboard'])->name('committee_member');


Route::get('/advisor', [AdvisorController::class, 'dashboard'])->name('advisor');


Route::get('/student', [StudentController::class, 'dashboard'])->name('student');