<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\AdvisorRequest;
use App\Models\Group;
use App\Models\JoinRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function selectAdvisor(Request $request)
    {
        // Retrieve the selected advisor's ID from the request
        $advisorId = $request->input('advisor_id');
        // dd($advisorId); 
        
        $group = Group::findOrFail(auth()->user()->student->group_id);

        // Create a new advisor request
        AdvisorRequest::create([
            'group_id' => $group->id,
            'advisor_id' => $advisorId,
            'advisor_status' => 'pending',
            'committee_status' => 'pending'
        ]);

        // Redirect or show success message
        return redirect()->route('student.groupInfo')->with('success', 'Advisor request sent successfully! Wait for approval.');
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


    // Advisor Request Related

    public function accept(AdvisorRequest $advisorRequest)
    {
        $advisorRequest->update(['advisor_status' => 'accepted']);
        $advisorRequest->advisor->update(['group_id' => $advisorRequest->sender_group->group_id]);

        return redirect()->route('advisor.view_group')->with([
            'success' => 'Group request accepted successfully.',
            'hasAccepted' => $advisorRequest->advisor->hasAcceptedAdvisorRequests(),
            'hasRejected' => $advisorRequest->advisor->hasRejectedAdvisorRequests(),
        ]);
    }

    public function reject(AdvisorRequest $advisorRequest, Request $request)
    {
        $advisorRequest->update([
            'advisor_status' => 'rejected',
            'reject_reason' => $request->input('reject_reason')
        ]);

        return redirect()->route('advisor.view_group')->with([
            'success' => 'Group request rejected.',
            'hasAccepted' => $advisorRequest->advisor->hasAcceptedAdvisorRequests(),
            'hasRejected' => $advisorRequest->advisor->hasRejectedAdvisorRequests(),
        ]);
    }


    // Committee Request Approval Related
    public function acceptApprove(AdvisorRequest $advisorRequest)
    {
        // Begin a transaction
        DB::beginTransaction();

        try {
            // Approve the current advisor request
            $advisorRequest->update([
                'committee_status' => 'approved'
            ]);

            // Update the group's advisor_id with the advisor's ID from the request
            $group = $advisorRequest->group;
            $group->update([
                'advisor_id' => $advisorRequest->advisor_id
            ]);

            // Remove all other advisor requests for the same advisor
            AdvisorRequest::where('advisor_id', $advisorRequest->advisor_id)
                        ->where('id', '!=', $advisorRequest->id)
                        ->delete();

            // Commit the transaction
            DB::commit();

            return redirect()->back()->with('success', 'Advisor request approved and other requests for this advisor removed successfully.');

        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();
            return redirect()->back()->with('error', 'There was an error approving the advisor request.');
        }
    }



    public function acceptReject(AdvisorRequest $advisorRequest)
    {
        $advisorRequest->update([
            'committee_status' => 'rejected',
            'advisor_status' => 'pending'
        ]);

        $group = $advisorRequest->group;
        $group->update([
            'advisor_id' => null
        ]);

        return redirect()->back()->with('success', 'Advisor request rejected successfully.');
    }

    public function rejectApprove(AdvisorRequest $advisorRequest)
    {
        $advisorRequest->update([
            'committee_status' => 'approved'
        ]);

        $group = $advisorRequest->group;
        $group->update([
            'advisor_id' => null
        ]);

        return redirect()->back()->with('success', 'Rejection approved successfully.');
    }

    public function rejectReject(AdvisorRequest $advisorRequest)
    {
        $advisorRequest->update([
            'committee_status' => 'rejected'
        ]);

        return redirect()->back()->with('success', 'Rejection rejected successfully.');
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
