<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\JoinRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    
    public function addStudents(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'student_username' => 'required|string',
        ]);

        // Retrieve the authenticated user
        $user = auth()->user();

        // Retrieve the receiver student based on the entered username
        $receiver = Student::whereHas('user', function ($query) use ($validatedData) {
            $query->where('username', $validatedData['student_username']);
        })->first();

        if (!$receiver) {
            return redirect()->back()->with('error', 'Student not found.');
        }

        // Create a new join request
        JoinRequest::create([
            'sender_id' => $user->student->id,
            'receiver_id' => $receiver->id,
            'status' => 'pending', // You can set an initial status for the request
        ]);

        
        return redirect()->back()->with('success', 'Join request sent to the' . $receiver->user->username. '.');
    }

    public function selectAdvisor(Request $request, $groupId)
    {
        // Retrieve group
        $group = Group::findOrFail($groupId);

        // Logic to select advisor for group (not included)

        // Redirect or show success message
    }

    // CRUDE ------------------------------------------------------

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
            'group_name' => 'required|string|max:255',
            'project_title' => 'required|string',
            'description' => 'required|string',
        ]);
        
        $user = auth()->user();

        // Create a new notice record
        $group = Group::create([
            'group_name' => $validatedData['group_name'],
            'project_title' => $validatedData['project_title'],
            'description' => $validatedData['description'],
        ]);
        
        // Update the group_id of the authenticated user (student)
        $user->student->update([
            'group_id' => $group->id, // Assign the group_id to the student
        ]);

        return redirect()->route('student.addStudent')->with('success', 'Group created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
