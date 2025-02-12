<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    //
    use AuthorizesRequests;
    public function index(){
$users=User::latest()->paginate(5);
        return view('admin.users.index',compact('users'));
    }
}
