<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function create()
    {
        return view('dashboard.settings');
    }
}