<?php


namespace App\Http\Livewire;
use App\Models\Profile;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Skill;
use App\Models\Link;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Gate;

class ProfileView extends ModalComponent
{
    
    public Profile $profile;
  

    public function mount(Profile $profile)
    {
        //$this->profile = $profile;
        $profile = Profile::findOrFail($this->profile->id);
        
    }
 
   
    public function render(Profile $profile)
    {
        $profile = Profile::findOrFail($this->profile->id);
        //return view('livewire.profile-view')->with('profile', $profile);
        return view('livewire.profile-view',compact('profile') );
       
    }

}
