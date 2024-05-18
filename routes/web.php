<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommitteeHeadController;
use App\Http\Controllers\CommitteeMemberController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\JoinRequestController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProjectReportController;
use App\Http\Controllers\ForumController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('join-requests', [JoinRequestController::class, 'index'])->name('join_requests.index');
Route::post('join-requests/{joinRequest}/accept', [JoinRequestController::class, 'accept'])->name('join_requests.accept');
Route::post('join-requests/{joinRequest}/reject', [JoinRequestController::class, 'reject'])->name('join_requests.reject');

//groups
Route::resource('groups', GroupController::class)->only(['store', 'show', 'edit', 'update', 'destroy']);
Route::post('/groups/add-students', [GroupController::class, 'addStudents'])->name('groups.addStudents');
Route::post('/groups/select-advisor', [GroupController::class, 'selectAdvisor'])->name('groups.selectAdvisor');
Route::post('/groups/add-creator', [GroupController::class, 'addCreator'])->name('groups.addCreator');
Route::post('/groups/accept/{advisorRequest}', [GroupController::class, 'accept'])->name('groups.accept');
Route::post('/groups/reject/{advisorRequest}', [GroupController::class, 'reject'])->name('groups.reject');

Route::post('/groups/acceptApprove/{advisorRequest}', [GroupController::class, 'acceptApprove'])->name('groups.acceptApprove');
Route::post('/groups/acceptReject/{advisorRequest}', [GroupController::class, 'acceptReject'])->name('groups.acceptReject');
Route::post('/groups/rejectApprove/{advisorRequest}', [GroupController::class, 'rejectApprove'])->name('groups.rejectApprove');
Route::post('/groups/rejectReject/{advisorRequest}', [GroupController::class, 'rejectReject'])->name('groups.rejectReject');


//notice
Route::resource('notices', NoticeController::class)->only(['store', 'show', 'edit', 'update', 'destroy']);

//report
Route::resource('reports', ProjectReportController::class)->only(['store', 'show', 'edit', 'update', 'destroy']);

//committee
Route::resource('committees', CommitteeController::class)->only(['store', 'show', 'edit', 'update', 'destroy']);

//advisor
Route::resource('advisors', AdvisorController::class)->only(['store', 'show', 'edit', 'update', 'destroy']);

//student
Route::resource('students', StudentController::class)->only(['store', 'show', 'edit', 'update', 'destroy']);

// routes/web.php
Route::get('/login', [LoginController::class, 'ShowLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('preventBackHistory');

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
    Route::resource('policies', PolicyController::class)->only(['store', 'show', 'edit', 'update', 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::get('/committee_member', [CommitteeMemberController::class, 'dashboard'])->name('committee_member');
    Route::get('/committee_member/manage_advisor', [CommitteeMemberController::class, 'manageAdvisor'])->name('committee_member.manage_advisor');
    Route::get('/committee_member/manage_student', [CommitteeMemberController::class, 'manageStudent'])->name('committee_member.manage_student');
    Route::get('/committee_member/view_group', [CommitteeMemberController::class, 'viewGroup'])->name('committee_member.view_group');
    Route::get('/committee_member/manage_notice', [CommitteeMemberController::class, 'manageNotice'])->name('committee_member.manage_notice');
    Route::get('/committee_member/view_report', [CommitteeMemberController::class, 'viewReport'])->name('committee_member.view_report');
    Route::get('/committee_member/view_policy', [CommitteeMemberController::class, 'viewPolicy'])->name('committee_member.view_policy');
});

Route::middleware('auth')->group(function () {
    Route::get('/advisor', [AdvisorController::class, 'dashboard'])->name('advisor');
    Route::get('/advisor/view_notice', [AdvisorController::class, 'viewNotice'])->name('advisor.view_notice');
    Route::get('/advisor/view_group', [AdvisorController::class, 'viewGroup'])->name('advisor.view_group');
    Route::get('/advisor/view_report', [AdvisorController::class, 'viewReport'])->name('advisor.view_report');
    Route::get('/advisor/forum', [AdvisorController::class, 'forum'])->name('advisor.forum');
    Route::get('/advisor/view_policy', [AdvisorController::class, 'viewPolicy'])->name('advisor.view_policy');
});


Route::middleware('auth')->group(function () {
    Route::get('/student', [StudentController::class, 'dashboard'])->name('student');
    Route::get('/student/forum', [StudentController::class, 'forum'])->name('student.forum');
    Route::get('/student/view_notice', [StudentController::class, 'viewNotice'])->name('student.view_notice');
    Route::get('/student/upload_report', [StudentController::class, 'uploadReport'])->name('student.upload_report');
    Route::get('/student/group', [StudentController::class, 'group'])->name('student.group');
    Route::get('/student/addStudent', [StudentController::class, 'showAddStudentsForm'])->name('student.addStudent');
    Route::get('/student/selectAdvisor', [StudentController::class, 'showSelectAdvisorForm'])->name('student.selectAdvisor');
    Route::get('/student/group_info', [StudentController::class, 'showGroupInfo'])->name('student.groupInfo');
    Route::get('/student/view_policy', [StudentController::class, 'viewPolicy'])->name('student.view_policy');

});




Route::middleware('auth')->group(function() {
    Route::get('/forum/{group}', [ForumController::class, 'show'])->name('forum.show');
    Route::post('/forum/{group}/post', [ForumController::class, 'post'])->name('forum.post');
});

