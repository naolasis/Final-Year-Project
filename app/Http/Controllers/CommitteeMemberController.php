<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommitteeMemberController extends Controller
{
    public function dashboard(){
        return view('committee_member.dashboard');
    }
}
