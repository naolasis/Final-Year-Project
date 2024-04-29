<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
            $user = Auth::user();
            return redirect()->route($this->redirectToRole($user));
        } else {
            return back()->withErrors(['error' => trans('auth.failed')]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    protected function redirectToRole($user)
    {
        switch (true) {
            case $user->isAdmin():
                return 'admin';
            case $user->isCommitteeHead():
                return 'committee_head';
            case $user->isCommitteeMember():
                return 'committee_member';
            case $user->isAdvisor():
                return 'advisor';
            case $user->isStudent():
                return 'student';
            default:
                return 'login';
        }
    }
}
