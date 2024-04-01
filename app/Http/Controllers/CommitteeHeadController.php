<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommitteeHeadController extends Controller
{
    public function dashboard(){
        return view('committee_head.dashboard');
    }
}
