<?php

namespace App\Http\Controllers;

use App\Models\Idea;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $user = Auth::user();
        $followingIDs = $user->followings()->pluck('user_id');

        $ideas = Idea::whereIn('user_id', $followingIDs)->latest();
        // if there is a search
        if (request()->has('search')) {
            $ideas = $ideas->search(request('search',''));
        }

        return view('dashboard', [
            'ideas' => $ideas->paginate(5)
        ]);
    }
}
