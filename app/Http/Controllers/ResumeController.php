<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\User;
use App\Models\Design;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;


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
   

      public function preview($id, $name) {
        if (Auth::check())
        {
        $user = auth()->user();
        $profile=Profile::where(array('user_id' => $id))->first();
       
        $educations=Education::where('profile_id', $id)->get();
        $experiences=Experience::where('profile_id', $id)->get();
        $languages=Language::where('profile_id', $id)->get();
        
        return view($name)->with('profile', $profile)->with('experiences', $experiences)->with('educations', $educations)->with('languages', $languages);
        }else{
            return redirect()->to('/');
        }
     
    }
    public function herunteladen($id, $name) {
        if (Auth::check())
        {
        $user = auth()->user();
        $profile=Profile::where(array('user_id' => $id))->first();
        $educations=Education::where('profile_id', $id)->get();
        $experiences=Experience::where('profile_id', $id)->get();
        $languages=Language::where('profile_id', $id)->get();         

        $pdf = \App::make('dompdf.wrapper');  
      
        Pdf::setOption(['isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true, 'chroot' => '/public/storage/']);
        
        $pdf->getDomPDF()->setBasePath('/public/storage')->set_option('enable_remote', TRUE);
        
        //$pdf = Pdf::loadView('resume', $data);    
           // Render the HTML as PDF
           $pdf = PDF::loadView($name, ['profile' => $profile,
           'educations'=>$educations,
           'experiences'=>$experiences,
           'languages'=>$languages])->setOptions(['defaultFont' => 'sans-serif']);

        
        // Output the generated PDF to Browser
        return $pdf->stream(); // screenshot #2
        }else{
        return redirect()->to('/');
        }
    
      }

   

    
}
