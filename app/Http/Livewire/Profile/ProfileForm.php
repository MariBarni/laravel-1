<?php

namespace App\Http\Livewire\Profile;

use App\Models\Profile;
use App\Models\User;
use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;

use Illuminate\Database\Eloquent\Model;
use Livewire\WithFileUploads;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;


use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\HasManyRepeater;
use Illuminate\Contracts\Auth\Authenticatable;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Support\HtmlString;
use Closure;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Radio;
use App\Http\Controllers\ResumeController;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;




class ProfileForm extends Component implements HasForms
{
    use InteractsWithForms; 
    use WithFileUploads;

    public Profile $profile;  
    public  $profileid;
    public  $userid;
    public null|string $token = null;     
    public null|string $name = null;
    public null|string $vorname = null;
    public null|string $identifikation= null;
    public null|string $email= null;
    public null|string $telefonnummer= null;
    public null|string $geburtstag= null;
    public null|string $geburtsort= null;
    public null|string $straße= null;
    public null|string $plz= null;
    public null|string $ort= null;
    public null|string $land= null;
    public  $profileimg;
     /* TagsVariables*/
     public null|array $tags =[];

    public function mount(Profile $profile): void
    {
        $this->profileid=$profile->id;
        $this->userid=$profile->user_id;
        
        $this->form->fill([
            'name' => $profile->name,
            'vorname' => $profile->vorname,
            'identifikation'=> $profile->identifikation,
            'email' => $profile->email,
            'telefonnummer' => $profile->telefonnummer,
            'geburtstag' => $profile->geburtstag,
            'geburtsort' => $profile->geburtsort,
            'straße' => $profile->straße,
            'plz' => $profile->plz,
            'ort' => $profile->ort,
            'land' => $profile->land,
            'profileimg'=> $profile->profileimg,         
            'tags' => $profile->tags,
                        
        ]);
       
    }
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Card::make()
            ->schema([
        
           Forms\Components\Wizard::make()->schema([                               
            
               Forms\Components\Wizard\Step::make('profile')->label(label:'Persönliche Daten editieren')->icon(icon:'heroicon-o-user')
                ->schema([           
                    Forms\Components\TextInput::make('name')->minLength(2)->maxLength(255)->required(),            
                    Forms\Components\TextInput::make('vorname')->minLength(2)->maxLength(255)->required(),                
                    Forms\Components\Select::make('identifikation')->options(
                        ['Männlich' => 'Männlich',
                        'Weiblich' => 'Weiblich',
                        'Divers ' => 'Divers',])->default('Männlich')->disablePlaceholderSelection()->required(),                  
                    Forms\Components\TextInput::make(name:'email')->label(label:'E-Mail Adresse')->minLength(2)->maxLength(255)->email()->required(),  
                    Forms\Components\TextInput::make('telefonnummer')->tel()->numeric(),               
                    Forms\Components\DatePicker::make(name:'geburtstag')->label(label:'Geburtstag')->displayFormat('d.m.Y')->minDate(now()->subYears(90))->maxDate(now())->format('d.m.Y'),    
                    Forms\Components\TextInput::make('geburtsort')->minLength(2)->maxLength(255),            
                    Forms\Components\TextInput::make('straße')->minLength(2)->maxLength(255)->required()->columnSpan('full'),            
                    Forms\Components\TextInput::make(name:'plz')->label(label:'PLZ')->numeric()->required()->maxLength(10),            
                    Forms\Components\TextInput::make(name:'ort')->minLength(2)->maxLength(255)->label(label:'Ort')->required(),           
                    Forms\Components\TextInput::make(name:'land')->minLength(2)->maxLength(255)->label(label:'Land')->required(),
                    FileUpload::make('profileimg')->label(label:'Foto hochladen')->image()->required(),
                    Forms\Components\TagsInput::make(name:'tags')->label(label:'Fähigkeiten')->placeholder('Fähigkeit hinzufügen')
                    ->suggestions([
                        'tailwindcss',
                        'alpinejs',
                        'laravel',
                        'livewire',
                        'Marketing',
                        'Vertrieb',
                        'Web',
                        'Produktmanagement',
                    ])->columns(2) ->columnSpan(2), 
                   ]),                
     
                           
                
            ])->columns(2) ->columnSpan(2)->submitAction(new HtmlString('<button wire:loading.attr="disabled" wire:key="submit" id="submit" wire:loading.remove
            wire:target="submit" class="filament-button filament-button-size-sm inline-flex items-center justify-center py-1 gap-1 
            font-medium rounded-lg border outline-none min-h-[2rem] px-3 text-sm text-white shadow border-transparent bg-primary-600 type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
</svg><span>Aktualisieren</span></button>')),            
            ]),
        ];
    }
       protected function getFormModel(): Profile
        {
            //return Profile::class;
            return $this->profile;
        }

    public function submit(){
        $this->profile->update(
            $this->form->getState(),
        );
        User::where(array('id' => $this->userid))->first()->update(['name' => $this->name,'email' => $this->email]);
       /*Profile::query()
       ->whereId($this->profileid)
       ->update([
            'name' => $this->name,
            'vorname' => $this->vorname,
            'wunschposition'=> $this->wunschposition,
            'email' => $this->email,
            'handynummer' => $this->handynummer,
            'geburtstag' => $this->geburtstag,
            'geburtsort' => $this->geburtsort,
            'straße' => $this->straße,
            'plz' => $this->plz,
            'ort' => $this->ort,
            'land' => $this->land,
            'profileimg'=> $this->profileimg,
            'tags' => $this->tags,

       ]);*/
    }


    public function render()
    {
        return view('livewire.profile.profile-form');
    }
}
