<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function create()
    {
        return view('dashboard.create-chat');
    }
}