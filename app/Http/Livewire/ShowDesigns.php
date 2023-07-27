<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Design;
use App\Models\Profile;
use cookie;

class ShowDesigns extends Component
{
    public $design;
    public $profile;
    public $profileID;

    public function mount($id)
    {
        $profileID=$this->profileID=$id;
        $designs= Design::all();
               
           
            return view('livewire.show-designs', [
                'designs' => Design::all(), 
                'profileID' =>$profileID ,         
            ]);   
        
    
    } 
   

    public function render()
    {
       
        return view('livewire.show-designs', [
            'designs' => Design::all(),            
        ]);
    }
   
}
