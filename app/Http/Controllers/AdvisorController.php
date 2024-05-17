<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\AdvisorRequest;
use App\Models\Group;
use App\Models\Notice;
use App\Models\Post;
use App\Models\Student;
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

    public function viewGroup()
    {
        $user_id = auth()->user()->advisor->id;
        $advisorRequests = AdvisorRequest::where('advisor_id', $user_id)->get();
        $requestedGroupIds = $advisorRequests->pluck('group_id');
        $otherGroups = Group::whereNotIn('id', $requestedGroupIds)->get();
        $students = Student::all();
        
        $acceptedGroup = $advisorRequests->where('advisor_status', 'accepted')->where('committee_status', 'approved')->first();
        // dd($acceptedGroup);

        return view('advisor.view_group', compact('advisorRequests', 'otherGroups', 'students', 'acceptedGroup'));
    }

    

    public function viewReport(){
        return view('advisor.view_report');
    }

    public function forum()
    {
        $group = auth()->user()->advisor->groups->first();

        if ($group) {
            $group_id = $group->id;
            $posts = Post::where('group_id', $group_id)->with('user')->get();
            return view('advisor.forum', compact('group', 'posts'));
        } else {
            // Handle case where advisor has no groups
            return view('advisor.forum', ['group' => null, 'posts' => collect()]);
        }
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
        ]);

        // Check if the username already exists
        if (User::where('username', $validatedData['username'])->exists()) {
            return redirect()->back()->withErrors(['username' => 'The username is already taken.']);
        }
    
        // Hash the password
        $hashedPassword = bcrypt($validatedData['password']);

        // Upload the image
        $imagePath = 'images/default_image.png';

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

        // Update the user record
        $advisor = Advisor::find($id);
        $user = $advisor->user;

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
