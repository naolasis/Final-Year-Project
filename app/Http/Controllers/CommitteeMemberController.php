<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\AdvisorRequest;
use App\Models\Committee;
use App\Models\Group;
use App\Models\Notice;
use App\Models\Policy;
use App\Models\ProjectReport;
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
        $advisors = Advisor::with('user')->get();
        return view('committee_member.manage_advisor', compact('advisors'));
    }

    public function manageStudent(){
        $students = Student::with('user')->get();
        return view('committee_member.manage_student', compact('students'));
    }

    public function viewGroup(){
        $groups = Group::all();
        $students = Student::all();
        $acceptedRequests = AdvisorRequest::where('advisor_status', 'accepted')->where('committee_status', 'pending')->get();
        $rejectedRequests = AdvisorRequest::where('advisor_status', 'rejected')->where('committee_status', 'pending')->get();

        return view('committee_member.view_group', compact('groups', 'students', 'acceptedRequests', 'rejectedRequests'));
    }

    public function manageNotice(){
        $notices = Notice::all();
        return view('committee_member.manage_notice', compact('notices'));
    }

    public function viewReport(){
        $reports = ProjectReport::all();
        $groups = Group::all();
        
        return view('committee_member.view_report', compact('reports', 'groups'));
    }

    public function viewPolicy(){
        $policies = Policy::all();
        return view('committee_member.view_policy', compact('policies'));
    }

}
