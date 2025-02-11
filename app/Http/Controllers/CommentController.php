<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Idea;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function store(CreateCommentRequest $request, Idea $idea)
    {

        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $validated['idea_id'] = $idea->id;
        // dd($validated);
        Comment::create($validated);
        return redirect()->route('ideas.show', $idea->id)->with('success', 'Comment was created Successfully');
    }
}
