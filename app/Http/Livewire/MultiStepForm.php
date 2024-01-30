<?php

namespace App\Http\Livewire;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\User;
use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Livewire\TemporaryUploadedFile;




class MultiStepForm extends Component implements HasForms
{
     use InteractsWithForms; 
    
    /* Profile Variables
    public null|string $bio = null;*/

    public Profile $profile;  
    public null|string $token = null;     
    public null|string $name = null;
    public null|string $vorname = null;
    public null|string $wunschposition= null;
    public null|string $email= null;
    public null|string $handynummer= null;
    public null|string $geburtstag= null;
    public null|string $geburtsort= null;
    public null|string $straße= null;
    public null|string $plz= null;
    public null|string $ort= null;
    public null|string $land= null;
    public null|array $profileimg= null;
    public null|string $templa = null;
   
    public $profileId;
    
    /* Experience Variables*/
    public null|array $experiences = [];

     /* Education Variables*/
     public null|array $educations=[]; 

     /* Education Variables*/
     public null|array $tags =[];
    
     /* Education Variables*/
     public null|array $languages=[];


     public function mount(): void
     {
        $this->form->fill();
     }

     protected function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make('Lebenslauf erstellen')
            ->description('Fülle die Lebenslauf-Vorlage Schritt für Schritt aus')
            ->schema([
            
               Forms\Components\Wizard::make()->schema([                               
                
                   Forms\Components\Wizard\Step::make('profile')->label(label:'Persönliche Daten')->icon(icon:'heroicon-o-user')
                    ->schema([           
                        Forms\Components\TextInput::make('name')->minLength(2)->maxLength(255)->required(),            
                        Forms\Components\TextInput::make('vorname')->minLength(2)->maxLength(255)->required(),
                        Forms\Components\Select::make('identifikation')->options(
                            ['Männlich' => 'Männlich',
                            'Weiblich' => 'Weiblich',
                            'Divers ' => 'Divers',])->default('Männlich')->disablePlaceholderSelection()->required(),                            
                        Forms\Components\TextInput::make(name:'email')->label(label:'E-Mail Adresse')->minLength(2)->maxLength(255)->email()->required(),  
                        Forms\Components\TextInput::make('telefonnummer')->tel()->alphaDash(), 
                        Forms\Components\TextInput::make(name:'geburtstag')->label(label:'Geburtstag')->type('date')->required(),                 
                        Forms\Components\TextInput::make('geburtsort')->minLength(2)->maxLength(255),            
                        Forms\Components\TextInput::make('straße')->minLength(2)->maxLength(255)->required()->columnSpan('full'),            
                        Forms\Components\TextInput::make(name:'plz')->label(label:'PLZ')->numeric()->required()->maxLength(10),            
                        Forms\Components\TextInput::make(name:'ort')->minLength(2)->maxLength(255)->label(label:'Ort')->required(),           
                        Forms\Components\TextInput::make(name:'land')->minLength(2)->maxLength(255)->label(label:'Land')->required(),
                        FileUpload::make('profileimg')->label(label:'Foto hochladen')->image()->required()->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                            return (string) str($file->getClientOriginalName())->prepend('custom-prefix-');
                        }),
                       ]),
                    
                    Forms\Components\Wizard\Step::make('experiencetab')->label(label:'Berufserfahrung')->icon(icon:'heroicon-o-briefcase')
                    ->schema([
                        Repeater::make(name:'experiences')->label(label:'')
                       ->schema([
                           Forms\Components\TextInput::make(name:'jname')->label(label:'Praktika, Nebenjobs oder Festanstellung ')->minLength(2)->maxLength(255)->required(),
                           Forms\Components\TextInput::make(name:'cnname')->label(label:'Unternehmen')->minLength(2)->maxLength(255)->required(),
                           Forms\Components\Textarea::make(name:'description')->label(label:'Beschreibung')->rows(3)
                               ->cols(20)->columnSpan(2),
                           Forms\Components\Checkbox::make(name:'currentj')->label(label:'Bis heute')
                               ->afterStateUpdated(function (Closure $set, $state) {
                            $set('finished_at', null);
                            })->reactive()->nullable(),
                           Forms\Components\DatePicker::make(name:'started_at')->label(label:'Von')
                           ->required()->columns(2) ->columnSpan(2),
                           Forms\Components\DatePicker::make(name:'finished_at')->label(label:'Bis')->afterOrEqual('started_at')
                           ->hidden(fn ($get) => $get('currentj'))
                           ->nullable()->withoutTime()->columns(2) ->columnSpan(2),
                       ])->orderable()->columns(2) ->columnSpan(2) ->minItems(0)->createItemButtonLabel('+')->relationship('experiences')                    
                    ]),

                    Forms\Components\Wizard\Step::make('educationtab')->label(label:'Bildungsweg')->icon(icon:'heroicon-o-academic-cap')
                    ->schema([
                        Repeater::make(name:'educations')->label(label:'')
                        ->schema([
                            
                           Forms\Components\TextInput::make(name:'abschluss')->label(label:'Abschluss')->minLength(2)->maxLength(255)->required()->placeholder('z. B. Mittlere Reife oder Abitur'),
                           Forms\Components\TextInput::make(name:'bildungseinrichtung')->label(label:'Bildungseinrichtung')->minLength(2)->maxLength(255)->required()->placeholder('Name der Schule'),
                           Forms\Components\TextInput::make(name:'fachrichtung')->label(label:'Fachrichtung')->minLength(2)->maxLength(255),
                           Forms\Components\TextInput::make(name:'orth')->label(label:'Ort')->minLength(2)->maxLength(255)->required(),                            
                           Forms\Components\Checkbox::make(name:'currente')->label(label:'Bis heute')
                                ->afterStateUpdated(function (Closure $set, $state) {
                                    $set('finished_at', null);
                                })
                                ->reactive()
                                ->nullable(),
                           Forms\Components\DatePicker::make(name:'started_at')->label(label:'Von')
                                ->required()->columns(2) ->columnSpan(2),
                           Forms\Components\DatePicker::make(name:'finished_at')->label(label:'Bis')->afterOrEqual('started_at')
                                ->hidden(fn ($get) => $get('currente'))
                                ->nullable()
                                ->withoutTime()->columns(2) ->columnSpan(2),
                        ])->orderable()->columns(2) ->columnSpan(2) ->minItems(1)->defaultItems(1)->createItemButtonLabel('+')->relationship('educations')
                    
                    ]),

                    Forms\Components\Wizard\Step::make('skilltab')->label(label:'Fähigkeiten')->icon(icon:'heroicon-o-star')
                    ->schema([
                        TagsInput::make(name:'tags')->label(label:'Fähigkeiten')->placeholder('Fähigkeit hinzufügen')
                        ->suggestions([
                            'tailwindcss',
                            'alpinejs',
                            'laravel',
                            'livewire',
                            'Marketing',
                            'Vertrieb',
                            'Web',
                            'Produktmanagement',
                        ])->columns(2) ->columnSpan(2)
                    ]),
   
                    Forms\Components\Wizard\Step::make('Languagetab')->label(label:'Sprachen')->icon(icon:'heroicon-o-shield-check')
                    ->schema([
                        Repeater::make(name:'languages')->label(label:'')
                        ->schema([
                        TextInput::make(name:'language')->label(label:'')->required()->minLength(2)
                        ->maxLength(255)->placeholder('Sprache hinzufügen'),
                        Select::make(name:'level')->label(label:'')->placeholder('Sprachkenntnisse wählen')
                        ->options([
                            '-' => '-',
                            'Grundlagen' => 'Grundlagen',
                            'Gut' => 'Gut',
                            'Fließend' => 'Fließend',
                            'Muttersprache' => 'Muttersprache',
                        ])
                        ->required(),
                         
                        ])->columns(2) ->columnSpan(2) ->minItems(1)->createItemButtonLabel('+')->relationship('languages')  
                    
                    ])->columns(2) ->columnSpan(2),
                    
                ])->columns(2) ->columnSpan(2)->submitAction(new HtmlString('<div style="margin: auto; width: 80%"><small><em>Ihre angegebenen Daten werden nur für die Erstellung des Lebenslaufes genutzt. Die Daten werden dabei nicht an Dritte weitergegeben. Rechtsgrundlage ist hierfür Art. 6 Abs. 1 S. 1 lit. a DDSGVO. Ihre angegebenen Daten werden nach 7 Tage gelöscht. 
                Weitere Informationen zu den Widerrufsmöglichkeiten und zum Datenschutz finden Sie unter xxx (Link DSE)</em></small>
                <br/>
                <button style="margin-left:auto;" wire:loading.attr="disabled" wire:key="submit" id="submit" wire:loading.remove
                wire:target="submit" class="filament-button filament-button-size-sm inline-flex items-center justify-center py-1 gap-1 
                font-medium rounded-lg border outline-none min-h-[2rem] px-3 text-sm text-white shadow border-transparent bg-primary-600 type="submit">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                <span>Speichern und weiter</span></button>
                <span
                wire:loading.inline-flex
                wire:target="submit"
                class="px-4 my-3 font-bold text-red-700 items-center">
                <div role="status">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Wird geladen...</span>
                </div>
                Bitte warten Sie...
            </span> </div>'))
                
                ])->columns(2),              

        ];
    }
    protected function getFormModel(): string
    {
        return Profile::class;
    }
    public function submit()
    {
     
            //create record
            $profile=Profile::create($this->form->getState());        
            $this->form->model($profile)->saveRelationships();
            $profileId=$profile->id;
            $proName=$profile->name;
            $proEmail=$profile->email;
            $proToken = Hash::make($profile->token); 
            
            
            $user=User::create( ['name' => $proName,'email'=>$proEmail,'password'=> $proToken]); 
       

            if(\Auth::attempt(array('email' => $proEmail, 'password' => $profile->token))){
                
                $profile=Profile::where(array('email' => $proEmail))->first()->update(['user_id' => $user->id,  'expires_at' => now()->addDays(7),]);
                //$profile=Profile::where(array('email' => $proEmail ))->first();
                //Mail::to($proEmail)->send(new \App\Mail\Registrierung($profile));
                User::whereEmail($proEmail)->first()->sendLoginLink();
              
                session()->flash('message', "You are Login successful.");
                return redirect()->route('model.show', ['id' => $user->id]);
        }else{
            session()->flash('error', 'email and password are wrong.');
            return redirect()->to('/');
        }
    

    }
   
    

    public function render(): View
    {
        return view('livewire.multi-step-form');
    }
 
 
         
    
}