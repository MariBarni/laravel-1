<?php

namespace App\Http\Controllers\Profile\Languages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('profile.languages.show', [
            'user' => auth()->user()->load('profile.languages'),
        ]);
    }
}
