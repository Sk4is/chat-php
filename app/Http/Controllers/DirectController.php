<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirectController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $friends = $user->allFriends();

        return view('direct', compact('friends'));
    }
}
