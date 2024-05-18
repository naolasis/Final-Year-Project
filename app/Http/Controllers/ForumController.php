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
        $request->validate(['content' => 'required']);
        
        $post = $group->posts()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        // Render the new post as HTML
        $postHtml = view('partials.forum_post', compact('post'))->render();

        return response()->json(['html' => $postHtml]);
    }

}
