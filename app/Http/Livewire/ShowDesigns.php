<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Design;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;




class ShowDesigns extends Component
{
    public $design;
    public $profile;
    public $profileID;
  

    public function mount($id)
    {
        if (Auth::check()){
            
            $id = Auth::id();
            $profile=Profile::where(array('user_id' => $id))->first();
            $profileID=$profile->id;
          
 
                return view('livewire.show-designs', [
                    'designs' => Design::all(), 
                    'profileID' =>$profileID ,         
                ]);  

        }else{
            return Redirect::to('/');
        }
        
        
    
    } 
   

    public function render()
    {
       
        return view('livewire.show-designs', [
            'designs' => Design::all(),            
        ]);
    }
   
}
