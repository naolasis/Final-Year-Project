<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\Committee;
use App\Models\Group;
use App\Models\Notice;
use App\Models\Student;
use Illuminate\Http\Request;

class CommitteeMemberController extends Controller
{
    public function dashboard(){
        $noticeCount = Notice::count();
        $studentCount = Student::count();
        $noticeCount = Notice::count();
        $studentCount = Student::count();
        $advisorCount = Advisor::count();
        $committeeCount = Committee::count();
        $groupCount = Group::count();
        return view('committee_member.dashboard', compact('noticeCount', 'studentCount', 'advisorCount', 'committeeCount', 'groupCount'));
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
