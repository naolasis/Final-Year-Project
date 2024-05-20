<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
    public function update(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user(); // Get the authenticated user

        if (!$user) {
            return redirect()->back()->with('error', 'User not authenticated.');
        }

        // Retrieve the user model instance by ID
        $user = User::find($user->id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Check if the username already exists for another user
        $usernameExists = User::where('username', $validatedData['username'])
                            ->where('id', '<>', $user->id)
                            ->exists();

        if ($usernameExists) {
            return redirect()->back()->with('error', 'The username is already taken.');
        }

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            try {
                // Upload the new image
                $imagePath = $request->file('image')->store('images');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Image upload failed: ' . $e->getMessage());
            }
        } else {
            // Use the old image path if no new image is uploaded
            $imagePath = $user->image;
        }

        try {
            // Update the user model directly
            $user->update([
                'username' => $validatedData['username'],
                'fullname' => $validatedData['fullname'],
                'email' => $validatedData['email'],
                'image' => $imagePath,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'User update failed: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }


}
