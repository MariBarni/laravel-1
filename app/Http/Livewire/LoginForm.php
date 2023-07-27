<?php

namespace App\Http\Livewire;
use App\Models\Profile;
use Hash;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Livewire\Component;



class LoginForm extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public Profile $profile;    
    public User $users;
 
    public $email = '';
    public $token = '';
 
    public function mount(): void 
    {
        $this->form->fill();
    } 
 
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make(name:'email')->label(label:'E-Mail Adresse')->minLength(2)->maxLength(255)->email()->required(),  
            Forms\Components\TextInput::make(name:'token')->label(label:'Token')->password()->disableAutocomplete()
        ];
    }

    public function anmelden()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'token' => 'required',
        ]);

        if(\Auth::attempt(array('email' => $this->email, 'password' => $this->token))){
            //$profile=Profile::where(array('email' => $this->email,'token' => $this->token ))->first();
            $profile=Profile::where(array('email' => $this->email))->first();
            session()->flash('message', "You are Login successful.");
            return redirect()->route('model.show', ['id' => $profile->id]);
    }else{
        session()->flash('error', 'email and password are wrong.');
        return redirect()->to('/');
    }


    }
    public function abmelden() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
