<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Post;

class ForumController extends Controller
{
    public function show(Group $group)
    {
        // Ensure the group and its posts with user relationship are loaded
        $posts = $group->posts()->with('user')->get();
        return view('forum.show', compact('group', 'posts'));
    }


    public function post(Request $request, Group $group)
    {
        $userRole = auth()->user()->role;
        $request->validate(['content' => 'required']);
        
        $group->posts()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        if($userRole == 'student') {
            return redirect()->route('student.forum', $group);
        }
        if($userRole == 'advisor') {
            return redirect()->route('advisor.forum', $group);
        }

    }

}
