<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
class UserProfileController extends Controller
{
    public function index()
    {
        $users = UserProfile::all();
        return view('page.users.index', compact('users'));

    }
}
