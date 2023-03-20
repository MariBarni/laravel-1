<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use App\Models\JobTitle;
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




class ProfileForm extends Component implements HasForms
{
    use InteractsWithForms; 
   
    public $last_name;
    public $name;
    public JobTitle $jobtitle;
    public Profile $profile;
    
    public null|array $experiences;

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
            
                Forms\Components\Wizard::make()->schema([
                    Forms\Components\Wizard\Step::make(label:'Persönliche Daten')
                    ->schema([
                        Forms\Components\TextInput::make('name')->required(),            
                        Forms\Components\TextInput::make('vorname')->required(),                
                        Forms\Components\TextInput::make('Deine_Wunschposition')->columnSpan('full'),
                    /*Forms\Components\Select::make('Jobtitle')->label('Deine_Wunschposition')
                    ->searchable()
                    ->getSearchResultsUsing(fn (string $search) => JobTitle::where('name', 'like', "%{$search}%")->limit(50)->pluck('name', 'id'))
                    ->getOptionLabelUsing(fn ($value): ?string => JobTitle::find($value)?->name),      */      
                        Forms\Components\TextInput::make('E-Mail')->email()->required(),  
                        Forms\Components\TextInput::make('Handynummer')->tel(),                
                        Forms\Components\DatePicker::make('dein_geburtstag')->displayFormat('d/m/Y')->minDate(now()->subYears(150))->maxDate(now()),    
                        Forms\Components\TextInput::make('Geburtstagort'),            
                        Forms\Components\TextInput::make('straße')->required()->columnSpan('full'),            
                        Forms\Components\TextInput::make('PLZ')->required(),            
                        Forms\Components\TextInput::make('Ort')->required(),           
                        Forms\Components\TextInput::make('Land')->required(),
                        FileUpload::make('Foto hochladen')->image(),
                    ]),
                    Forms\Components\Wizard\Step::make(label:'Beruferfahrung')
                    ->schema([
                        Repeater::make(name:'experiences')->label(label:'')
                ->schema([
                    TextInput::make(name:'jname')->label(label:'Positionsbezeichnung')->required(),
                    TextInput::make(name:'cname')->label(label:'Unternehmen')->required(),
                    TextInput::make(name:'description')->label(label:'Beschreibung'),
                    Checkbox::make(name:'current')->label(label:'Bis heute')
                        ->afterStateUpdated(function (Closure $set, $state) {
                            $set('finished_at', null);
                        })
                        ->reactive()
                        ->nullable(),
                    DatePicker::make(name:'started_at')->label(label:'Von')
                        ->required(),
                    DatePicker::make(name:'finished_at')->label(label:'Bis')
                        ->hidden(fn ($get) => $get('current'))
                        ->nullable()
                        ->withoutTime(),
                ])
                ->orderable()
                    
                    ]),
                    Forms\Components\Wizard\Step::make(label:'Bildungsweg')
                    ->schema([
                        Repeater::make(name:'education')->label(label:'')
                        ->schema([
                            TextInput::make(name:'field_of_study')->label(label:'Studiengang')->required(),
                            TextInput::make(name:'degree')->label(label:'Abschluss')->required(),
                            TextInput::make(name:'institution')->label(label:'Hochschule'),
                            TextInput::make(name:'description')->label(label:'Beschreibung'),
                            Checkbox::make(name:'current')->label(label:'Bis heute')
                                ->afterStateUpdated(function (Closure $set, $state) {
                                    $set('finished_at', null);
                                })
                                ->reactive()
                                ->nullable(),
                            DatePicker::make(name:'started_at')->label(label:'Von')
                                ->required(),
                            DatePicker::make(name:'finished_at')->label(label:'Bis')
                                ->hidden(fn ($get) => $get('current'))
                                ->nullable()
                                ->withoutTime(),
                        ])
                        ->orderable()
                    
                    ]),
                    Forms\Components\Wizard\Step::make(label:'Fähigkeiten')
                    ->schema([
                    
                    ]),
                    Forms\Components\Wizard\Step::make(label:'Sprachen')
                    ->schema([
                    
                    ]),



                    
                ])->columns(2) ->columnSpan(2)
                
            
                

           
            
            // ...
        ];
    } 
    public function create(): void 
    {
        Profile::create($this->form->getState());
    } 
 
 
    public function submit(): void
    {
        // ...
        dd($this->form->getState());
    }

    public function render(): View
    {
        return view('livewire.profile-form');
    }
}
