<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Post;

class ForumController extends Controller
{
    public function show(Group $group)
    {
        dd($group); 
        $posts = $group->posts()->with('user')->get();
        return view('forum.show', compact('group', 'posts'));
    }


    public function post(Request $request, Group $group)
    {
        $request->validate(['content' => 'required']);
        
        $group->posts()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->route('forum.show', $group);
    }
}
