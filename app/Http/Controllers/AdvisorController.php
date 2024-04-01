<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    public function dashboard(){
        return view('advisor.dashboard');
    }
}
