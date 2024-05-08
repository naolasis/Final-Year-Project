<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
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
            'notice_title' => 'required|string|max:255',
            'notice_content' => 'required|string',
        ]);
        
        // Get the authenticated user's username
        $username = Auth::user()->username;

        // Create a new notice record
        Notice::create([
            'title' => $validatedData['notice_title'],
            'content' => $validatedData['notice_content'],
            'posted_by' => $username,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Notice created successfully!');
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
        // Find the notice by ID
        $notice = Notice::findOrFail($id);

        // Show an edit form
        return view('notices.notice_edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'notice_title' => 'required|string|max:255',
            'notice_content' => 'required|string',
        ]);

        // Find the notice by ID
        $notice = Notice::findOrFail($id);

        // Update notice details
        $notice->update([
            'title' => $validatedData['notice_title'],
            'content' => $validatedData['notice_content'],
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Notice updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notice = Notice::findOrFail($id);
        $notice->delete();

        return redirect()->back()->with('success', 'Notice deleted successfully!');
    }
}
