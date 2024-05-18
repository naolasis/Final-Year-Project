<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PolicyController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'policy_title' => 'required|string|max:255',
            'policy_content' => 'required|string',
        ]);

        // Create a new policy record
        Policy::create([
            'title' => $validatedData['policy_title'],
            'content' => $validatedData['policy_content'],
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Policy created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the policy by ID
        $policy = Policy::findOrFail($id);

        // Show an edit form
        return view('committee_head.policy_edit', compact('policy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'policy_title' => 'required|string|max:255',
            'policy_content' => 'required|string',
        ]);

        // Find the policy by ID
        $policy = Policy::findOrFail($id);

        // Update policy details
        $policy->update([
            'title' => $validatedData['policy_title'],
            'content' => $validatedData['policy_content'],
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Policy updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $policy = Policy::findOrFail($id);
        $policy->delete();

        return redirect()->back()->with('success', 'Policy deleted successfully!');
    }
}
