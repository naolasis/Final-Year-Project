<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\User;
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

        // Check if the username already exists
        if (User::where('username', $validatedData['username'])->exists()) {
            return redirect()->back()->withErrors(['username' => 'The username is already taken.']);
        }
    
        // Hash the password
        $hashedPassword = bcrypt($validatedData['password']);

        // Upload the image
        $imagePath = 'images/default_image.png';

        // Determine the role based on the selected type
        $role = ($validatedData['type'] === 'committee_head') ? 'committee_head' : 'committee_member';

        // Create a new user record
        $user = User::create([
            'username' => $validatedData['username'],
            'password' => $hashedPassword,
            'role' => $role,
            'fullname' => $validatedData['fullname'],
            'email' => $validatedData['email'],
            'image' => $imagePath,
        ]);

        // Create a new committee record
        Committee::create([
            'user_id' => $user->id, // Using id of the user created
            'type' => $validatedData['type'],
        ]);

        return redirect()->back()->with('success', 'Committee created successfully!');
    }
    

    public function show(string $id)
    {
        // Display the specified resource.
    }
 
    public function edit(string $id)
    {
        $committee = Committee::findOrFail($id);
        return view('admin.committee_edit', compact('committee'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'type' => 'required|string|in:committee_head,committee_member',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Hash the password
        $hashedPassword = bcrypt($validatedData['password']);

        // Determine the role based on the selected type
        $role = ($validatedData['type'] === 'committee_head') ? 'committee_head' : 'committee_member';

        // Update the user record
        $committee = Committee::find($id);
        $user = $committee->user;

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            // Upload the new image
            $imagePath = $request->file('image')->store('images');
        } else {
            // Use the old image path if no new image is uploaded
            $imagePath = $user->image;
        }
        
        $user->update([
            'username' => $validatedData['username'],
            'password' => $hashedPassword,
            'role' => $role,
            'fullname' => $validatedData['fullname'],
            'email' => $validatedData['email'],
            'image' => $imagePath,
        ]);

        // Update the committee record
        $committee->update([
            'type' => $validatedData['type'],
        ]);

        return redirect()->back()->with('success', 'Committee updated successfully!');
    }

    public function destroy(string $id)
    {
        $committee = Committee::findOrFail($id);
        
        $user = $committee->user;
        $committee->delete();
        $user->delete();

        return redirect()->back()->with('success', 'Committee deleted successfully!');
    }

}
