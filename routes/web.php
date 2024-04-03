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


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin');
    Route::get('/manage_committee', [AdminController::class, 'manageCommittee'])->name('admin.manage_committee');
});

Route::prefix('committee_head')->group(function () {
    Route::get('/', [CommitteeHeadController::class, 'dashboard'])->name('committee_head');
    Route::get('/manage_advisor', [CommitteeHeadController::class, 'manageAdvisor'])->name('committee_head.manage_advisor');
    Route::get('/manage_student', [CommitteeHeadController::class, 'manageStudent'])->name('committee_head.manage_student');
    Route::get('/view_group', [CommitteeHeadController::class, 'viewGroup'])->name('committee_head.view_group');
    Route::get('/manage_policy', [CommitteeHeadController::class, 'managePolicy'])->name('committee_head.manage_policy');
    Route::get('/manage_notice', [CommitteeHeadController::class, 'manageNotice'])->name('committee_head.manage_notice');
    Route::get('/view_report', [CommitteeHeadController::class, 'viewReport'])->name('committee_head.view_report');
    Route::get('/upload_result', [CommitteeHeadController::class, 'uploadResult'])->name('committee_head.upload_result');
});

Route::prefix('committee_member')->group(function () {
    Route::get('/', [CommitteeMemberController::class, 'dashboard'])->name('committee_member');
    Route::get('/manage_advisor', [CommitteeMemberController::class, 'manageAdvisor'])->name('committee_member.manage_advisor');
    Route::get('/manage_student', [CommitteeMemberController::class, 'manageStudent'])->name('committee_member.manage_student');
    Route::get('/view_group', [CommitteeMemberController::class, 'viewGroup'])->name('committee_member.view_group');
    Route::get('/manage_notice', [CommitteeMemberController::class, 'manageNotice'])->name('committee_member.manage_notice');
    Route::get('/view_report', [CommitteeMemberController::class, 'viewReport'])->name('committee_member.view_report');
});

Route::prefix('advisor')->group(function () {
    Route::get('/', [AdvisorController::class, 'dashboard'])->name('advisor');
    Route::get('/view_notice', [AdvisorController::class, 'viewNotice'])->name('advisor.view_notice');
    Route::get('/view_group', [AdvisorController::class, 'viewGroup'])->name('advisor.view_group');
    Route::get('/view_report', [AdvisorController::class, 'viewReport'])->name('advisor.view_report');
    Route::get('/forum', [AdvisorController::class, 'forum'])->name('advisor.forum');
});

Route::prefix('student')->group(function () {
    Route::get('/', [StudentController::class, 'dashboard'])->name('student');
    Route::get('/forum', [StudentController::class, 'forum'])->name('student.forum');
    Route::get('/group', [StudentController::class, 'group'])->name('student.group');
    Route::get('/view_notice', [StudentController::class, 'viewNotice'])->name('student.view_notice');
    Route::get('upload_report', [StudentController::class, 'uploadReport'])->name('student.upload_report');
});