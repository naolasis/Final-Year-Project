<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\Committee;
use App\Models\Group;
use App\Models\Notice;
use App\Models\Policy;
use App\Models\Student;
use Illuminate\Http\Request;

class CommitteeHeadController extends Controller
{
    public function dashboard(){
        $noticeCount = Notice::count();
        $studentCount = Student::count();
        $advisorCount = Advisor::count();
        $committeeCount = Committee::count();
        $groupCount = Group::count();
        return view('committee_head.dashboard', compact('noticeCount', 'studentCount', 'advisorCount', 'committeeCount', 'groupCount'));
    }

    public function manageAdvisor(){
        $advisors = Advisor::with('user')->get();
        return view('committee_head.manage_advisor', compact('advisors'));
    }

    public function manageStudent(){
        $students = Student::with('user')->get();
        return view('committee_head.manage_student', compact('students'));
    }

    public function viewGroup(){
        return view('committee_head.view_group');
    }

    public function managePolicy(){
        $policies = Policy::all();
        return view('committee_head.manage_policy', compact('policies'));
    }

    public function manageNotice(){
        $notices = Notice::all();
        return view('committee_head.manage_notice', compact('notices'));
    }

    public function viewReport(){
        return view('committee_head.view_report');
    }

    public function uploadResult(){
        return view('committee_head.upload_result');
    }
}
