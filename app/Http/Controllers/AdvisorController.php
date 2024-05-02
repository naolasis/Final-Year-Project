<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    public function dashboard(){
        $noticeCount = Notice::count();
        return view('advisor.dashboard', compact('noticeCount'));
    }

    public function viewNotice(){
        $notices = Notice::all();
        $latestNotice = Notice::latest()->first();
        return view('advisor.view_notice', compact('notices', 'latestNotice'));
    }

    public function viewGroup(){
        return view('advisor.view_group');
    }

    public function viewReport(){
        return view('advisor.view_report');
    }

    public function forum(){
        return view('advisor.forum');
    }


}
