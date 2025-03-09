<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;


class ContactController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            throw new Exception("No authenticated user found in the request!");
        }
        return response()->json($user->allFriends());
    }
}
