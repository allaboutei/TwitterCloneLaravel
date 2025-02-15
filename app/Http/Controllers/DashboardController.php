<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        // return new WelcomeEmail(Auth::user());

        $ideas = Idea::orderBy('created_at', 'DESC');
        // if there is a search
        if (request()->has('search')) {
            $ideas = $ideas
            ->search(request('search',''));
        }

        return view('dashboard', [
            'ideas' => $ideas->paginate(5),

        ]);
    }
}
