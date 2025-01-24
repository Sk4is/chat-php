<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

class ListDisplayController extends Controller
{
    public function create()
    {
        return view('dashboard.display-of-lists');
    }
}