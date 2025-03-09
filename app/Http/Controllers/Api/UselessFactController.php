<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class UselessFactController extends Controller
{
    public function index()
    {
        $response = Http::get('https://uselessfacts.jsph.pl/api/v2/facts/random?language=en');

        $fact = $response->successful() ? $response->json()['text'] : 'Weatherman Willard Scott was the first original Ronald McDonald.';

        return view('welcome', compact('fact'));
    }
}
