<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response
    {
        //
        return view('profile.show',[
            'profile' => user()->profile
        ]);
        //$profile = Profile::all();
  
       // return view('profile.show',compact('profiles'));
    }
}
