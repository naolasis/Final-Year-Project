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
        // Retrieve the authenticated user
        $user = auth()->user();

        if (JoinRequest::where('receiver_id', $user->student->id)->exists()) {
            return redirect()->route('student.groupInfo');
        }

        // Validate the request data
        $validatedData = $request->validate([
            'student_username' => 'required|string',
        ]);

        // Retrieve the receiver student based on the entered username
        $receiver = Student::whereHas('user', function ($query) use ($validatedData) {
            $query->where('username', $validatedData['student_username']);
        })->first();

        
        if (!$receiver) {
            return redirect()->back()->with('error', 'Student not found.');
        } else {
            $receiver_id = $receiver->user->student->id;
        }
        
        // Check if the receiver already has a pending or accepted join request
        if ($receiver->receivedJoinRequests()->whereIn('status', ['pending', 'accepted'])->exists()) {
            return redirect()->back()->with('error', $receiver->user->username . ' already has a pending or accepted join request, or is already in a group.');
        }

        // make shure the receiver is not this user
        if ($user->student->id == $receiver_id) {
            return redirect()->back()->with('error', 'You\'re trying to add yourself! You\'re already in this group.');
        }

        // If a join request exists with reject, update its status to "pending"
        if ($receiver->hasRejectedJoinRequests()) {
            JoinRequest::where('receiver_id', $receiver_id)->update(['status' => 'pending']);
        } else {
            // If no join request exists, create a new one
            JoinRequest::create([
                'sender_id' => $user->student->id,
                'receiver_id' => $receiver->id,
                'status' => 'pending',
            ]);
        }


        
        return redirect()->back()->with('success', 'Join request sent to ' . $receiver->user->username. '.');
    }

    public function selectAdvisor(Request $request, $groupId)
    {
        // Retrieve group
        $group = Group::findOrFail($groupId);

        // Logic to select advisor for group (not included)

        // Redirect or show success message
    }

    public function addCreator()
    {
        $user = auth()->user();
        $joinRequestExists = JoinRequest::where('receiver_id', $user->student->id)->exists();
        if ($joinRequestExists) {
            return redirect()->route('student.groupInfo');
        }
    
        JoinRequest::create([
            'sender_id' => $user->student->id,
            'receiver_id' => $user->student->id,
            'status' => 'accepted',
        ]);

        return redirect()->route('student.groupInfo')->with('success', 'Added all student successfully.');
    }


    // CRUDE ------------------------------------------------------

    /**
     * Display a listing of the resource.
     */

     public function index()
    {
        //
    }


    // public function displayInfo()
    // {
    //     $id = auth()->user()->student->group->id;
    //     $group = Group::findOrFail($id);
    //     return view('student.groupInfo', compact('group'));
    // }

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
