<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Student;
use Illuminate\Http\Request;

class CommitteeHeadController extends Controller
{
    public function dashboard(){
        $noticeCount = Notice::count();
        $studentCount = Student::count();
        return view('committee_head.dashboard', compact('noticeCount', 'studentCount'));
    }

    public function manageAdvisor(){
        return view('committee_head.manage_advisor');
    }

    public function manageStudent(){
        return view('committee_head.manage_student');
    }

    public function viewGroup(){
        return view('committee_head.view_group');
    }

    public function managePolicy(){
        return view('committee_head.manage_policy');
    }

    public function manageNotice(){
        return view('committee_head.manage_notice');
    }

    public function viewReport(){
        return view('committee_head.view_report');
    }

    public function uploadResult(){
        return view('committee_head.upload_result');
    }
}
