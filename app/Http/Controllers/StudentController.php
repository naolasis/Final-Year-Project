<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\Group;
use App\Models\Notice;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard(){
        $noticeCount = Notice::count(); // Get the count of notices
        return view('student.dashboard', compact('noticeCount')); // Pass noticeCount to the view
    }

    public function forum(){
        return view('student.forum');
    }

    public function group(){
        return view('student.group.createGroup');
    }

    public function showAddStudentsForm()
    {
        return view('student.group.addStudents');
    }

    public function showSelectAdvisorForm()
    {
        $advisors = Advisor::all();
        return view('student.group.selectAdvisor', compact('advisors'));
    }

    public function showGroupInfo(){
        return view('student.group.group_info');
    }


    public function viewNotice() {
        $notices = Notice::all(); // Fetch all notices
        $latestNotice = Notice::latest()->first(); // Get the latest notice
        return view('student.view_notice', compact('notices', 'latestNotice'));
    }

    public function uploadReport() {
        return view('student.upload_report');
    }

    // --------------------------------------
    // for student editing
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
       $imagePath = 'images/default_image.png';

        // Create a new user record
        $user = User::create([
            'username' => $validatedData['username'],
            'password' => $hashedPassword,
            'role' => 'student',
            'fullname' => $validatedData['fullname'],
            'email' => $validatedData['email'],
            'image' => $imagePath,
        ]);

        // Create a new student record
        Student::create([
            'user_id' => $user->id, // Using id of the user created
        ]);

        return redirect()->back()->with('success', 'Student created successfully!');
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
