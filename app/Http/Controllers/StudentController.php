<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use App\Models\Advisor;
use App\Models\AdvisorRequest;
use App\Models\Group;
use App\Models\JoinRequest;
use App\Models\Notice;
use App\Models\Policy;
use App\Models\Post;
use App\Models\ProjectReport;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\ViewException;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function dashboard(){
        $noticeCount = Notice::count(); // Get the count of notices
        return view('student.dashboard', compact('noticeCount')); // Pass noticeCount to the view
    }

    public function forum()
    {
        $student = auth()->user()->student;
    
        if ($student && $student->group_id) {
            $group_id = $student->group_id;
            $group = Group::findOrFail($group_id); // Retrieve the actual group instance
            $posts = Post::where('group_id', $group_id)
                        ->with('user')
                        ->orderBy('created_at', 'desc') // Order by created_at in descending order
                        ->get();
    
            return view('student.forum', compact('group', 'posts'));
        } else {
            // Handle the case where the student has no group
            return redirect()->route('student')->with('error', 'No group found. You have to be in a group to open the forum!');
        }
    }
    



    public function group(){
        return view('student.group.createGroup');
    }

    public function showAddStudentsForm()
    {
        $counter = 0;
        $sender_id = auth()->user()->student->id;
        $requestStatuses =  JoinRequest::where('sender_id', $sender_id)->get();
        return view('student.group.addStudents', compact('requestStatuses', 'counter'));
    }

    public function showSelectAdvisorForm()
    {
        $advisors = Advisor::whereDoesntHave('groups')->get();
        
        return view('student.group.selectAdvisor', compact('advisors'));
    }



    public function showGroupInfo(){
        $thisStudent = auth()->user()->student;
        $group = $thisStudent->group;


        $joinRequest = JoinRequest::where('receiver_id', $thisStudent->id)->where('status', 'accepted')->first();
        $senderStudent = $joinRequest->sender;
        
        $senderJoinRequest = JoinRequest::where('receiver_id', $senderStudent->id)
        ->where('sender_id', $senderStudent->id)->where('status', 'accepted')->exists();
        
        $students = Student::with('user')->where('group_id', $group->id)->get();
        $advisorRequest = AdvisorRequest::where('group_id', $group->id)->first();
        
        // condition to check if committee_status is rejected
        if ($advisorRequest && $advisorRequest->advisor_status == 'rejected' && $advisorRequest->committee_status == 'approved') {
            $advisorRequest->delete();
            $advisorRequest = null; 
        }
        
        return view('student.group.group_info', compact('group', 'students', 'advisorRequest', 'senderJoinRequest'));
    }


    public function viewNotice() {
        $notices = Notice::all(); // Fetch all notices
        $latestNotice = Notice::latest()->first(); // Get the latest notice
        return view('student.view_notice', compact('notices', 'latestNotice'));
    }

    public function uploadReport()
    {
        // Retrieve the logged-in student
        $student = auth()->user()->student;

        // Check if the student exists and has a group
        if ($student && $student->group_id) {
            // Get all reports related to the student's group
            $reports = ProjectReport::where('group_id', $student->group_id)->get();

            return view('student.upload_report', compact('reports'));
        }
        
        return redirect()->route('student')->with('error', 'Student group information not found.');
    }

    public function viewPolicy(){
        $policies = Policy::all();
        return view('student.view_policy', compact('policies'));
    }

    public function editProfile() {
        $user = auth()->user();
        return view('student.edit_profile', compact('user'));
    }

    // --------------------------------------
    // for student editing
    // public function store(Request $request)
    // {
    //     // Validate the request data
    //     $validatedData = $request->validate([
    //         'fullname' => 'required|string|max:255',
    //         'username' => 'required|string|max:255',
    //         'email' => 'required|email',
    //         'password' => 'required|string|min:6',
    //         'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     // Check if the username already exists
    //     if (User::where('username', $validatedData['username'])->exists()) {
    //         return redirect()->back()->withErrors(['username' => 'The username is already taken.']);
    //     }
    
    //     // Hash the password
    //     $hashedPassword = bcrypt($validatedData['password']);

    //    // Upload the image
    //    $imagePath = 'images/default_image.png';

    //     // Create a new user record
    //     $user = User::create([
    //         'username' => $validatedData['username'],
    //         'password' => $hashedPassword,
    //         'role' => 'student',
    //         'fullname' => $validatedData['fullname'],
    //         'email' => $validatedData['email'],
    //         'image' => $imagePath,
    //     ]);

    //     // Create a new student record
    //     Student::create([
    //         'user_id' => $user->id, // Using id of the user created
    //     ]);

    //     return redirect()->back()->with('success', 'Student created successfully!');
    // }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        // Import the file
        Excel::import(new StudentsImport, $request->file('file'));

        return redirect()->back()->with('success', 'Students imported successfully!');
    }

 
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('student_edit', compact('student'));
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
        $student = Student::find($id);
        $user = $student->user;

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
            'role' => 'student',
            'fullname' => $validatedData['fullname'],
            'email' => $validatedData['email'],
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Student updated successfully!');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        
        $user = $student->user;
        $student->delete();
        $user->delete();

        return redirect()->back()->with('success', 'Student deleted successfully!');
    }
}
