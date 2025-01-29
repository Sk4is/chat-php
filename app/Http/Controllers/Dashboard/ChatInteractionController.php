<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

class ChatInteractionController extends Controller
{
    public function create()
    {
        return view('dashboard.interactions-in-chat');
    }
}