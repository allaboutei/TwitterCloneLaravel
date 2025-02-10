<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IdeaController extends Controller
{
    use AuthorizesRequests;
    //
    public function show(Idea $idea)
    {

        return view('ideas.show', compact('idea'));
    }

    public function store()
    {
        $validated = request()->validate(
            [
                'content' => 'required|min:5|max:240'
            ]
        );
        $validated['user_id'] = Auth::id();
        Idea::create($validated);
        return redirect()->route('dashboard')->with('success', 'Idea was created successfully');
    }

    public function destroy(Idea $idea)
    {
        $this->authorize('delete', $idea);
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea was deleted successfully');
    }

    public function edit(Idea $idea)
    {
        $this->authorize('update', $idea);
        $editing = True;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        $this->authorize('update', $idea);
        $validated = request()->validate(
            [
                'content' => 'required|min:5|max:240'
            ]
        );
        $idea->update($validated);
        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea was Updated successfully');
    }
}
