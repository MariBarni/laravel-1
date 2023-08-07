<?php

namespace App\Http\Controllers\Profile\Experiences;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        return view('profile.experiences.show', [
            'user' => auth()->user()->load('profile.experiences'),
        ]);
    }
}
