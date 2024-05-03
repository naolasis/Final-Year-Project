<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommitteeHeadController;
use App\Http\Controllers\CommitteeMemberController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\NoticeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});


//notice
Route::post('/notices', [NoticeController::class, 'store'])->name('notice.store');
Route::put('/notices/{notice}', [NoticeController::class, 'update'])->name('notice.update');

//committee
Route::resource('committees', CommitteeController::class)->only(['store', 'show', 'edit', 'update', 'destroy']);


// routes/web.php
Route::get('/login', [AuthController::class, 'ShowLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('preventBackHistory');


Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');
    Route::get('/admin/manage_committee', [AdminController::class, 'manageCommittee'])->name('admin.manage_committee');
});

Route::middleware('auth')->group(function () {
    Route::get('/committee_head', [CommitteeHeadController::class, 'dashboard'])->name('committee_head');
    Route::get('/committee_head/manage_advisor', [CommitteeHeadController::class, 'manageAdvisor'])->name('committee_head.manage_advisor');
    Route::get('/committee_head/manage_student', [CommitteeHeadController::class, 'manageStudent'])->name('committee_head.manage_student');
    Route::get('/committee_head/view_group', [CommitteeHeadController::class, 'viewGroup'])->name('committee_head.view_group');
    Route::get('/committee_head/manage_policy', [CommitteeHeadController::class, 'managePolicy'])->name('committee_head.manage_policy');
    Route::get('/committee_head/manage_notice', [CommitteeHeadController::class, 'manageNotice'])->name('committee_head.manage_notice');
    Route::get('/committee_head/view_report', [CommitteeHeadController::class, 'viewReport'])->name('committee_head.view_report');
    Route::get('/committee_head/upload_result', [CommitteeHeadController::class, 'uploadResult'])->name('committee_head.upload_result');
});

Route::middleware('auth')->group(function () {
    Route::get('/committee_member', [CommitteeMemberController::class, 'dashboard'])->name('committee_member');
    Route::get('/committee_member/manage_advisor', [CommitteeMemberController::class, 'manageAdvisor'])->name('committee_member.manage_advisor');
    Route::get('/committee_member/manage_student', [CommitteeMemberController::class, 'manageStudent'])->name('committee_member.manage_student');
    Route::get('/committee_member/view_group', [CommitteeMemberController::class, 'viewGroup'])->name('committee_member.view_group');
    Route::get('/committee_member/manage_notice', [CommitteeMemberController::class, 'manageNotice'])->name('committee_member.manage_notice');
    Route::get('/committee_member/view_report', [CommitteeMemberController::class, 'viewReport'])->name('committee_member.view_report');
});

Route::middleware('auth')->group(function () {
    Route::get('/advisor', [AdvisorController::class, 'dashboard'])->name('advisor');
    Route::get('/advisor/view_notice', [AdvisorController::class, 'viewNotice'])->name('advisor.view_notice');
    Route::get('/advisor/view_group', [AdvisorController::class, 'viewGroup'])->name('advisor.view_group');
    Route::get('/advisor/view_report', [AdvisorController::class, 'viewReport'])->name('advisor.view_report');
    Route::get('/advisor/forum', [AdvisorController::class, 'forum'])->name('advisor.forum');
});


Route::middleware('auth')->group(function () {
    Route::get('/student', [StudentController::class, 'dashboard'])->name('student');
    Route::get('/student/forum', [StudentController::class, 'forum'])->name('student.forum');
    Route::get('/student/group', [StudentController::class, 'group'])->name('student.group');
    Route::get('/student/view_notice', [StudentController::class, 'viewNotice'])->name('student.view_notice');
    Route::get('/student/upload_report', [StudentController::class, 'uploadReport'])->name('student.upload_report');
});
