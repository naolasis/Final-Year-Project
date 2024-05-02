<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\Committee;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $studentCount = Student::count();
        $advisorCount = Advisor::count();
        $committeeCount = Committee::count();
        $groupCount = Group::count();
        return view('admin.dashboard', compact('studentCount'));
    }

    public function manageCommittee(){
        return view('admin.manage_committee'); 
    }
}
