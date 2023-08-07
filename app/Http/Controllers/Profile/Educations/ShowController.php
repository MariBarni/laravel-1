<?php

namespace App\Http\Controllers\Profile\Educations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('profile.educations.show', [
            'user' => auth()->user()->load('profile.educations'),
        ]);
    }
}
