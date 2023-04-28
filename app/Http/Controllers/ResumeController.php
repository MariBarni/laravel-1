<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ResumeController extends Controller
{
    //
    /*public function index()
    {
        

        return view('resume');
       // return view('resume-ref', compact('user'));
        // return view('resume2', compact('user'));
    }*/

   /* public function download()
    {
        $user = auth()->user();

        $pdf = \PDF::loadView('resume-ref', compact('user'));
        return $pdf->download('resume.pdf');
    }*/
    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return view('resume')->with('profile', $profile);
    }

    
}
