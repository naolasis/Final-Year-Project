<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard(){
        return view('student.dashboard');
    }

    public function forum(){
        return view('student.forum');
    }

    public function group(){
        return view('student.group');
    }

    public function viewNotice() {
        return view('student.view_notice');
    }

    public function uploadReport() {
        return view('student.upload_report');
    }
}
