<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard(){
        $noticeCount = Notice::count(); // Get the count of notices
        return view('student.dashboard', compact('noticeCount')); // Pass noticeCount to the view
    }

    public function forum(){
        return view('student.forum');
    }

    public function group(){
        return view('student.group');
    }

    public function viewNotice() {
        $notices = Notice::all(); // Fetch all notices
        $latestNotice = Notice::latest()->first(); // Get the latest notice
        return view('student.view_notice', compact('notices', 'latestNotice'));
    }

    public function uploadReport() {
        return view('student.upload_report');
    }
}
