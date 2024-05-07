<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    public function dashboard(){
        $noticeCount = Notice::count();
        return view('advisor.dashboard', compact('noticeCount'));
    }

    public function viewNotice(){
        $notices = Notice::all();
        $latestNotice = Notice::latest()->first();
        return view('advisor.view_notice', compact('notices', 'latestNotice'));
    }

    public function viewGroup(){
        return view('advisor.view_group');
    }

    public function viewReport(){
        return view('advisor.view_report');
    }

    public function forum(){
        return view('advisor.forum');
    }

    // --------------------------------------
    // for advisor editing
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Hash the password
        $hashedPassword = bcrypt($validatedData['password']);

        // Upload the image
        $imagePath = $request->file('image')->store('images'); // Store the image in storage/app/public/images

        // Create a new user record
        $user = User::create([
            'username' => $validatedData['username'],
            'password' => $hashedPassword,
            'role' => 'advisor',
            'fullname' => $validatedData['fullname'],
            'email' => $validatedData['email'],
            'image' => $imagePath,
        ]);

        // Create a new advisor record
        Advisor::create([
            'user_id' => $user->id, // Using id of the user created
        ]);

        return redirect()->back()->with('success', 'Advisor created successfully!');
    }
    
 
    public function edit(string $id)
    {
        $advisor = Advisor::findOrFail($id);
        return view('advisor_edit', compact('advisor'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Hash the password
        $hashedPassword = bcrypt($validatedData['password']);

        // Upload the image
        $imagePath = $request->file('image')->store('images');

        // Update the user record
        $advisor = Advisor::find($id);
        $user = $advisor->user;
        $user->update([
            'username' => $validatedData['username'],
            'password' => $hashedPassword,
            'role' => 'advisor',
            'fullname' => $validatedData['fullname'],
            'email' => $validatedData['email'],
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Advisor updated successfully!');
    }

    public function destroy(string $id)
    {
        $advisor = Advisor::findOrFail($id);
        
        $user = $advisor->user;
        $advisor->delete();
        $user->delete();

        return redirect()->back()->with('success', 'Advisor deleted successfully!');
    }

}
