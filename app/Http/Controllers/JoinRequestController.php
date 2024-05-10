<?php

namespace App\Http\Controllers;

use App\Models\JoinRequest;
use Illuminate\Http\Request;

class JoinRequestController extends Controller
{
    public function index()
    {
        $joinRequests = JoinRequest::where('receiver_id', auth()->user()->student->id)->get();
        return view('student.group.join_requests', compact('joinRequests'));
    }

    public function accept(JoinRequest $joinRequest)
    {
        // Update the join request status to accepted
        $joinRequest->update(['status' => 'accepted']);

        // Update the receiver student's group_id
        $joinRequest->receiver->update(['group_id' => $joinRequest->sender->group_id]);

        // Redirect back with success message
        return redirect()->route('student.groupInfo')->with('success', 'Join request accepted successfully.');
    }

    public function reject(JoinRequest $joinRequest)
    {
        // Update the join request status to rejected
        $joinRequest->update(['status' => 'rejected']);

        // Redirect back with success message
        return redirect()->route('join_requests.index')->with('success', 'Join request rejected.');
    }
}
