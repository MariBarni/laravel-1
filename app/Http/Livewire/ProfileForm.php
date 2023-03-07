<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;



class ProfileForm extends Component implements HasForms
{
    use InteractsWithForms; 
   
    public $last_name;
    public $name;
    public $biography;

    public function mount(Profile $profile): void
    {
            $this->last_name = $profile->last_name;
            $this->name = $profile->name;
            $this->biography = $profile->biography; 
    }
    protected function getFormSchema(): array 
    {
        return [
            Forms\Components\TextInput::make('last_name')->required(),
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\MarkdownEditor::make('biography'),
            // ...
        ];
    } 
 
    public function submit(): void
    {
        // ...
    }

    public function render(): View
    {
        return view('livewire.profile-form');
    }
}
