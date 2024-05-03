<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:6', // Adjusted validation rule
            'type' => 'required|string|in:committee_head,committee_member', // Adjusted validation rule
        ]);
    
        // Hash the password
        $hashedPassword = bcrypt($validatedData['password']);
    
        // Create a new committee record
        Committee::create([
            'fullname' => $validatedData['fullname'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $hashedPassword,
            'type' => $validatedData['type']
        ]);
    
        return redirect()->back()->with('success', 'Committee created successfully!');
        
    }
    

    public function show(string $id)
    {
        // Display the specified resource.
    }
 
    public function edit(string $id)
    {
        // Show the form for editing the specified resource.
    }

    public function update(Request $request, string $id)
    {
        // Update the specified resource in storage.
    }

    public function destroy(string $id)
    {
        // Remove the specified resource from storage.
    }
}
