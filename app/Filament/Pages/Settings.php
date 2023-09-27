<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Pages\Actions\Action;
use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;



class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.settings';
    protected static ?string $model = Profile::class;
    protected function getActions(): array
    {
        return [
            Action::make('Server Bereinigung')
                ->action('script')
                ->requiresConfirmation()
                ->modalHeading('Aufgelaufene Beiträge und Bilder löschen')
                ->modalSubheading('Sind Sie sicher, dass Sie diese Beiträge und Bilder vom Server löschen möchten? Das kann nicht rückgängig gemacht werden')
                ->modalButton('Ja, löschen Sie sie')
        ];
    }
    public function script()
    {
      //delete expired records 
     $date  = Carbon::now();
     $profiles = Profile::where('expires_at', '<', $date )->get();
     foreach($profiles as $prof){
        $bild=$prof->profileimg;           
        //Storage::move( "public/{$bild}", "public/new/{$bild}/");
        Storage::delete( "public/{$bild}/");  
        $user_pr=$prof->user_id;            
        User::where('id', '=', $user_pr )->delete();
     }
    }
}
