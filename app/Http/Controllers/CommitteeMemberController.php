<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommitteeMemberController extends Controller
{
    public function dashboard(){
        return view('committee_member.dashboard');
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
