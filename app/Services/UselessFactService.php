<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class UselessFactService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://uselessfacts.jsph.pl/api/v2/facts/random?language=en';
    }

    public function getRandomFact()
    {
        $response = Http::get($this->baseUrl);
        
        if ($response->successful()) {
            return $response->json()['text']; 
        }

        return 'Weatherman Willard Scott was the first original Ronald McDonald.';
    }
}
