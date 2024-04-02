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
Route::get('/manage_advisor', [CommitteeHeadController::class, 'manageAdvisor'])->name('manage_advisor');
Route::get('/manage_student', [CommitteeHeadController::class, 'manageStudent'])->name('manage_student');
Route::get('/view_group', [CommitteeHeadController::class, 'viewGroup'])->name('view_group');
Route::get('/manage_policy', [CommitteeHeadController::class, 'managePolicy'])->name('manage_policy');
Route::get('/manage_notice', [CommitteeHeadController::class, 'manageNotice'])->name('manage_notice');
Route::get('/view_report', [CommitteeHeadController::class, 'viewReport'])->name('view_report');
Route::get('/upload_result', [CommitteeHeadController::class, 'uploadResult'])->name('upload_result');





Route::get('/committee_member', [CommitteeMemberController::class, 'dashboard'])->name('committee_member');


Route::get('/advisor', [AdvisorController::class, 'dashboard'])->name('advisor');


Route::get('/student', [StudentController::class, 'dashboard'])->name('student');