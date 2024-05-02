<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class CommitteeMemberController extends Controller
{
    public function dashboard(){
        $noticeCount = Notice::count();
        return view('committee_member.dashboard', compact('noticeCount'));
    }

    public function manageAdvisor(){
        return view('committee_member.manage_advisor');
    }

    public function manageStudent(){
        return view('committee_member.manage_student');
    }

    public function viewGroup(){
        return view('committee_member.view_group');
    }

    public function manageNotice(){
        return view('committee_member.manage_notice');
    }

    public function viewReport(){
        return view('committee_member.view_report');
    }

}
