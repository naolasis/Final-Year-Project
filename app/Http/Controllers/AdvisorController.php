<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    public function dashboard(){
        return view('advisor.dashboard');
    }

    public function viewNotice(){
        return view('advisor.view_notice');
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
