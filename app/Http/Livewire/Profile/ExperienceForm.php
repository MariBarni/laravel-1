<?php

namespace App\Http\Livewire\Profile;

use App\Models\Profile;
use App\Models\User;
use App\Models\Experience;

use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Database\Eloquent\Model;

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

class ExperienceForm extends Component implements HasForms
{
    use InteractsWithForms; 
    public Profile $profile; 

    public function mount(Profile $profile): void
    {
        /*$userid=Auth::user()->id;
        $profile=Profile::where(array('user_id' => $userid))->first();*/
           
        $this->profile = $profile;
        $this->form->fill([
            'experiences' =>$profile->experiences?->toArray(),
        ]);

    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Card::make()
            ->schema([
        
           Forms\Components\Wizard::make()->schema([                               
            
            Forms\Components\Wizard\Step::make('experiencetab')->label(label:'Berufserfahrung editieren')->icon(icon:'heroicon-o-briefcase')
                        ->schema([
                            HasManyRepeater::make(name:'experiences')->label(label:'')->relationship('experiences')
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
                               ->required()->columns(2)->columnSpan(2)->displayFormat('d.m.Y'),
                               Forms\Components\DatePicker::make(name:'finished_at')->label(label:'Bis')->afterOrEqual('started_at')
                               ->hidden(fn ($get) => $get('currentj'))
                               ->nullable()->withoutTime()->columns(2) ->columnSpan(2)->displayFormat('d.m.Y'),
                           ])->orderable('sort')->columns(2) ->columnSpan(2) ->minItems(0)->createItemButtonLabel('+')                    
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
        return $this->profile;
    } 

    public function submit(): void
    {
        $this->profile->update(
            $this->form->getState(),
        );
    } 
 

    public function render()
    {
        return view('livewire.profile.experience-form');
    }
}
