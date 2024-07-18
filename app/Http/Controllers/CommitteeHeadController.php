<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\AdvisorRequest;
use App\Models\Committee;
use App\Models\Evaluation;
use App\Models\Group;
use App\Models\Notice;
use App\Models\Policy;
use App\Models\ProjectReport;
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

    public function studentList(){

        $students = Student::with('user')->get();

        return view('committee_head.student_list', compact('students'));

    }

    public function viewGroup(){
        $groups = Group::all();
        $students = Student::all();
        $acceptedRequests = AdvisorRequest::where('advisor_status', 'accepted')->where('committee_status', 'pending')->get();
        $rejectedRequests = AdvisorRequest::where('advisor_status', 'rejected')->where('committee_status', 'pending')->get();

        return view('committee_head.view_group', compact('groups', 'students', 'acceptedRequests', 'rejectedRequests'));    
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
        $reports = ProjectReport::where('report_type', 'final')->get();
        $groups = Group::all();
        
        return view('committee_head.view_report', compact('reports', 'groups'));
    }

    public function evaluationResult(){
        $evaluations = Evaluation::where('final_mark', null)->get();
        $groups = Group::all();
        $students = Student::all();
    
        return view('committee_head.evaluation_result', compact('groups', 'students', 'evaluations'));
    }
    

    public function evaluationResultForm($id){
        
        $students = Student::where('group_id', $id)->get();
        $evaluations = Evaluation::where('group_id', $id)->get();

        return view('committee_head.evaluation_result_form', compact('students', 'evaluations'));
    }

    public function editProfile() {
        $user = auth()->user();
        return view('committee_head.edit_profile', compact('user'));
    }
}
