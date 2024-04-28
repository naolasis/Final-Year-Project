<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();
            if ($user->isAdmin()) {
                return redirect()->route('admin');
            } elseif ($user->isCommitteeHead()) {
                return redirect()->route('committee_head');
            } elseif ($user->isCommitteeMember()) {
                return redirect()->route('committee_member');
            } elseif ($user->isAdvisor()) {
                return redirect()->route('advisor');
            } elseif ($user->isStudent()) {
                return redirect()->route('student');
            } else {
                // Handle other roles or redirect to a default dashboard
                return redirect('/dashboard');
            }
        } else {
            // Authentication failed
            return back()->withErrors('Invalid credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
