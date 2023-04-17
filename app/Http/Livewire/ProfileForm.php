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
use Illuminate\Support\HtmlString;
use Closure;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Radio;






class ProfileForm extends Component implements HasForms
{
    use InteractsWithForms; 
    
    public Profile $profile;
    public $vorname;
    public $name;
    public $wunschposition;
   
 
  

    public function mount(): void
    {
        
         $this ->form->fill();
        /*  $this->last_name = $profile->last_name;
            $this->name = $profile->name;
             */
    }
    protected function getFormSchema(): array 
    {
        return [
            Forms\Components\Section::make('Schritt 1: Design festlegen')
            ->description('Los geht´s, wähle eine Vorlage für deinen Lebenslauf aus!')
            ->schema([
                Radio::make(name:'design')->label(label:'')
    ->options([
        'd1' => 'Design 1',
        'd2' => 'Design 2',
        'd3' => 'Design 3'
    ])->inline(),
// ...
            ])->columns(2)->collapsible(),
            Forms\Components\Section::make('Schritt 2: Lebenslauf erstellen')
            ->description('Fülle die Lebenslauf-Vorlage Schritt für Schritt aus.')
            ->schema([
            
               Forms\Components\Wizard::make()->schema([                               
                
                   Forms\Components\Wizard\Step::make('Profile')->label(label:'Persönliche Daten')->icon(icon:'heroicon-o-user')
                    ->schema([           
                        Forms\Components\TextInput::make('Name')->minLength(2)->maxLength(255)->required(),            
                        Forms\Components\TextInput::make('Vorname')->minLength(2)->maxLength(255)->required(),                
                        Forms\Components\TextInput::make(name:'Wunschposition')->label(label:'Wunschposition')->minLength(2)->maxLength(255)->columnSpan('full'),                  
                        Forms\Components\TextInput::make(name:'E-Mail')->label(label:'E-Mail Adresse')->minLength(2)->maxLength(255)->email()->required(),  
                        Forms\Components\TextInput::make('Handynummer')->tel(),                
                        Forms\Components\DatePicker::make(name:'Geburtstag')->label(label:'Geburtstag')->displayFormat('d/m/Y')->minDate(now()->subYears(120))->maxDate(now()),    
                        Forms\Components\TextInput::make('Geburtsort')->minLength(2)->maxLength(255),            
                        Forms\Components\TextInput::make('Straße')->minLength(2)->maxLength(255)->required()->columnSpan('full'),            
                        Forms\Components\TextInput::make(name:'PLZ')->label(label:'PLZ')->required(),            
                        Forms\Components\TextInput::make(name:'Ort')->minLength(2)->maxLength(255)->label(label:'Ort')->required(),           
                        Forms\Components\TextInput::make(name:'Land')->minLength(2)->maxLength(255)->label(label:'Land')->required(),
                        FileUpload::make('profileimg')->label(label:'Foto hochladen')->image()->required(),
                    ]),
                    
                    Forms\Components\Wizard\Step::make('Experience')->label(label:'Beruferfahrung')->icon(icon:'heroicon-o-briefcase')
                    ->schema([
                        Repeater::make(name:'experiences')->label(label:'')->relationship('experiences')
                    ->schema([
                    TextInput::make(name:'JName')->label(label:'Positionsbezeichnung')->minLength(2)->maxLength(255)->required(),
                    TextInput::make(name:'CName')->label(label:'Unternehmen')->minLength(2)->maxLength(255)->required(),
                    Textarea::make(name:'description')->label(label:'Beschreibung')->rows(3)
                    ->cols(20)->columnSpan(2),
                    Checkbox::make(name:'currentJ')->label(label:'Bis heute')
                        ->afterStateUpdated(function (Closure $set, $state) {
                            $set('finished_at', null);
                        })
                        ->reactive()
                        ->nullable(),
                    DatePicker::make(name:'started_at')->label(label:'Von')
                        ->required()->columns(2) ->columnSpan(2),
                    DatePicker::make(name:'finished_at')->label(label:'Bis')
                        ->hidden(fn ($get) => $get('currentJ'))
                        ->nullable()
                        ->withoutTime()->columns(2) ->columnSpan(2),
                    ])
                    ->orderable()->columns(2) ->columnSpan(2) ->minItems(1)->createItemButtonLabel('+')                    
                    ]),

                    Forms\Components\Wizard\Step::make('Education')->label(label:'Bildungsweg')->icon(icon:'heroicon-o-academic-cap')
                    ->schema([
                        Repeater::make(name:'educations')->label(label:'')
                        ->schema([
                            
                            TextInput::make(name:'Abschluss')->label(label:'Abschluss')->minLength(2)->maxLength(255)->required()->placeholder('z. B. Mittlere Reife oder Abitur'),
                            TextInput::make(name:'Bildungseinrichtung')->label(label:'Bildungseinrichtung')->minLength(2)->maxLength(255)->required()->placeholder('Name der Schule'),
                            TextInput::make(name:'Fachrichtung')->label(label:'Fachrichtung')->minLength(2)->maxLength(255),
                            TextInput::make(name:'OrtH')->label(label:'Ort')->minLength(2)->maxLength(255)->required(),                            
                            Checkbox::make(name:'currentE')->label(label:'Bis heute')
                                ->afterStateUpdated(function (Closure $set, $state) {
                                    $set('finished_at', null);
                                })
                                ->reactive()
                                ->nullable(),
                            DatePicker::make(name:'started_at')->label(label:'Von')
                                ->required()->columns(2) ->columnSpan(2),
                            DatePicker::make(name:'finished_at')->label(label:'Bis')
                                ->hidden(fn ($get) => $get('currentE'))
                                ->nullable()
                                ->withoutTime()->columns(2) ->columnSpan(2),
                        ])
                        ->orderable()->columns(2) ->columnSpan(2) ->minItems(1)->createItemButtonLabel('+')
                    
                    ]),

                    Forms\Components\Wizard\Step::make('Skill')->label(label:'Fähigkeiten')->icon(icon:'heroicon-o-star')
                    ->schema([
                       TagsInput::make(name:'skills')->label(label:'Fähigkeiten')->placeholder('Fähigkeit hinzufügen')
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
   
                    Forms\Components\Wizard\Step::make('Language')->label(label:'Sprachen')->icon(icon:'heroicon-o-shield-check')
                    ->schema([
                        Repeater::make(name:'sprachen')->label(label:'')
                        ->schema([
                        TextInput::make(name:'language')->label(label:'')->required()->minLength(2)
                        ->maxLength(255)->placeholder('Sprache hinzufügen'),
                        Select::make(name:'level')->label(label:'')->placeholder('Sprachkenntnisse wählen')
                        ->options([
                            '0' => '-',
                            '1' => 'Grundlagen',
                            '2' => 'Gut',
                            '3' => 'Fließend',
                            '4' => 'Muttersprache',
                        ])
                        ->required(),
                         
                        ])->columns(2) ->columnSpan(2) ->minItems(1)->createItemButtonLabel('+'),  
                    
                    ])->columns(2) ->columnSpan(2),
                    
                ])->columns(2) ->columnSpan(2)->submitAction(new HtmlString('<button type="submit">Submit</button>'))
                
                ])->columns(2)->collapsed(),
                

           
            
            // ...
        ];
    } 

    protected function getFormModel(): string
    {
        return Profile::class;
    }
 
    public function create(): void 
    {
        $profile=Profile::create($this->form->getState());        
        $this->form->model($profile)->saveRelationships(); 
    } 
 
 
    public function submit()
    {

        //dd($this->form->getState());
        $this->post->update(
            $this->form->getState(),
        );
                              
       
    }

  

    public function render(): View
    {
        return view('livewire.profile-form');
    }
}
