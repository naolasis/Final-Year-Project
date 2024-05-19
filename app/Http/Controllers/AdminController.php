<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\Committee;
use App\Models\Group;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $studentCount = Student::count();
        $advisorCount = Advisor::count();
        $committeeCount = Committee::count();
        $groupCount = Group::count();
        return view('admin.dashboard', compact('studentCount', 'advisorCount', 'committeeCount', 'groupCount'));
    }

    public function manageCommittee(){
        $committees = Committee::with('user')->get();
        return view('admin.manage_committee', compact('committees'));
    }

    public function editProfile() {
        $user = auth()->user();
        return view('admin.edit_profile', compact('user'));
    }
}
