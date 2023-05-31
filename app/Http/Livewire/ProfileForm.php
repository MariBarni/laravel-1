<?php

namespace App\Http\Livewire;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Skill;
use App\Models\Link;
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





class ProfileForm extends Component implements HasForms
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

     public $currentStep = 1;
     public $totalSteps = 2;
    
 
     public function mount(): void
     {
        $this->form->fill();
        $this->currentStep = 1;
     
     }
     

     protected function getFormSchema(): array 
     {
         return [
             Forms\Components\Section::make('Schritt 1: Design festlegen')
             ->description('Los geht´s, wähle eine Vorlage für deinen Lebenslauf aus!')
             ->schema([
                 Radio::make(name:'templa')->label(label:'')
                    ->options([
                        'resume' => 'Design 1',
                        'resume2' => 'Design 2',
                        'resume3' => 'Design 3'
                    ])->inline(),
             ])->columns(2)->collapsible(),

             Forms\Components\Section::make('Schritt 2: Lebenslauf erstellen')
             ->description('Fülle die Lebenslauf-Vorlage Schritt für Schritt aus.')
             ->schema([
             
                Forms\Components\Wizard::make()->schema([                               
                 
                    Forms\Components\Wizard\Step::make('profile')->label(label:'Persönliche Daten')->icon(icon:'heroicon-o-user')
                     ->schema([           
                         Forms\Components\TextInput::make('name')->minLength(2)->maxLength(255)->required(),            
                         Forms\Components\TextInput::make('vorname')->minLength(2)->maxLength(255)->required(),                
                         Forms\Components\TextInput::make(name:'wunschposition')->label(label:'Wunschposition')->minLength(2)->maxLength(255)->columnSpan('full'),                  
                         Forms\Components\TextInput::make(name:'email')->label(label:'E-Mail Adresse')->minLength(2)->maxLength(255)->email()->required(),  
                         Forms\Components\TextInput::make('handynummer')->tel(),                
                         Forms\Components\DatePicker::make(name:'geburtstag')->label(label:'Geburtstag')->displayFormat('d/m/Y')->minDate(now()->subYears(120))->maxDate(now())->format('d/m/Y'),    
                         Forms\Components\TextInput::make('geburtsort')->minLength(2)->maxLength(255),            
                         Forms\Components\TextInput::make('straße')->minLength(2)->maxLength(255)->required()->columnSpan('full'),            
                         Forms\Components\TextInput::make(name:'plz')->label(label:'PLZ')->numeric()->required(),            
                         Forms\Components\TextInput::make(name:'ort')->minLength(2)->maxLength(255)->label(label:'Ort')->required(),           
                         Forms\Components\TextInput::make(name:'land')->minLength(2)->maxLength(255)->label(label:'Land')->required(),
                         FileUpload::make('profileimg')->label(label:'Foto hochladen')->image()->required(),
                        ]),
                     
                     Forms\Components\Wizard\Step::make('experiencetab')->label(label:'Berufserfahrung')->icon(icon:'heroicon-o-briefcase')
                     ->schema([
                         Repeater::make(name:'experiences')->label(label:'')
                        ->schema([
                            Forms\Components\TextInput::make(name:'jname')->label(label:'Positionsbezeichnung')->minLength(2)->maxLength(255)->required(),
                            Forms\Components\TextInput::make(name:'cnname')->label(label:'Unternehmen')->minLength(2)->maxLength(255)->required(),
                            Forms\Components\Textarea::make(name:'description')->label(label:'Beschreibung')->rows(3)
                                ->cols(20)->columnSpan(2),
                            Forms\Components\Checkbox::make(name:'currentj')->label(label:'Bis heute')
                                ->afterStateUpdated(function (Closure $set, $state) {
                             $set('finished_at', null);
                             })->reactive()->nullable(),
                            Forms\Components\DatePicker::make(name:'started_at')->label(label:'Von')
                            ->required()->columns(2) ->columnSpan(2),
                            Forms\Components\DatePicker::make(name:'finished_at')->label(label:'Bis')
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
                            Forms\Components\DatePicker::make(name:'finished_at')->label(label:'Bis')
                                 ->hidden(fn ($get) => $get('currente'))
                                 ->nullable()
                                 ->withoutTime()->columns(2) ->columnSpan(2),
                         ])->orderable()->columns(2) ->columnSpan(2) ->minItems(1)->defaultItems(2)->createItemButtonLabel('+')->relationship('educations')
                     
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
                     
                 ])->columns(2) ->columnSpan(2)->submitAction(new HtmlString('<button   class="filament-button filament-button-size-sm inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2rem] px-3 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700" type="submit">Submit</button>'))
                 
                 ])->columns(2)->collapsed(),              

          
         ];
     } 

     protected function getFormModel(): string
    {
        return Profile::class;
    }
 
 
 
    public function create(): void 
    {
        
    } 
 
 
    public function submit()
    {
    

        $this->currentStep++;
         if($this->currentStep > $this->totalSteps){
             $this->currentStep = $this->totalSteps;
         }

         $profile=Profile::create($this->form->getState());        
         $this->form->model($profile)->saveRelationships();
         $profileId=$profile->id;
         $currentStep= 2;
         return view('livewire.profile-form', compact(['profile', $currentStep]));
       
         //$profile=Profile::where('email', $this->email)->get();
        
                              
        //return redirect()->route('resume', [$id]);
       
    }

  

    public function render(): View
    {
        return view('livewire.profile-form');
    }
}
