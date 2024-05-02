<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommitteeController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|password',
            'type' => 'required|string',
        ]);
        

        // Create a new notice record
        Committee::create([
            'fullname' => $validatedData['fullname'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'type' => $validatedData['type']
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Notice created successfully!');
    }
}
