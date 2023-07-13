<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Design;
use Barryvdh\DomPDF\Facade\Pdf;

//use PDF;


class ResumeController extends Controller
{
    //
    /*public function index()
    {
        

        return view('resume');
       // return view('resume-ref', compact('user'));
        // return view('resume2', compact('user'));
    }
    public function download()
    {
        $user = auth()->user();

        $pdf = \PDF::loadView('resume-ref', compact('user'));
        return $pdf->download('resume.pdf');
    }
    
    */

   /*public function download($id)
    {
        $profile = Profile::findOrFail($id);

        $pdf = \PDF::loadView('resume', compact('profile'))->setPaper('a4', 'portrait');
        return $pdf->download('resume.pdf');
    }*/
    public function download($id) {
        $profile = Profile::findOrFail($id);
        $templa=$profile->templa;
        //$view = View('resume')->with('profile', $profile);  
       

          $data = [
            'profile'     => $profile,
            
        ];
        $pdf = \App::make('dompdf.wrapper');  
      
        Pdf::setOption(['isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true, 'chroot' => '/public/storage/']);
        
        $pdf->getDomPDF()->setBasePath('/public/storage')->set_option('enable_remote', TRUE);
        
        //$pdf = Pdf::loadView('resume', $data);    
           // Render the HTML as PDF
           $pdf = PDF::loadView($templa, ['profile' => $profile])->setOptions(['defaultFont' => 'sans-serif']);

        
        // Output the generated PDF to Browser
        return $pdf->stream(); // screenshot #2
   
    
      }

    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        $templa=$profile->templa;
     
        return view($templa)->with('profile', $profile);

    }
    public function model()
    {
        $designs = Design::all();           
        return view($vorschau)->with('designs', $designs);

    }

    
}
