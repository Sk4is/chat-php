<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

class SearchToolController extends Controller
{
    public function create()
    {
        return view('dashboard.search-tool');
    }
}