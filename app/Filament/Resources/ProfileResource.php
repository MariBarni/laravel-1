<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use Filament\Resources\RelationManagers\RelationGroup;
use App\Models\Profile;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\ImageColumn;
use Livewire\TemporaryUploadedFile;


class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;
    protected static ?string $navigationGroup = 'Lebenslauf';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-identification';
 
   

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('vorname')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Select::make('identifikation')->options(
                        [''=> '',
                            'Männlich' => 'Männlich',
                        'Weiblich' => 'Weiblich',
                        'Divers ' => 'Divers',])->default('')->disablePlaceholderSelection(), 
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telefonnummer')
                    ->maxLength(255),
                Forms\Components\DatePicker::make(name:'geburtstag')
                    ->label(label:'Geburtstag')
                    ->displayFormat('d.m.Y')
                    ->minDate(now()->subYears(90))->maxDate(now())->format('d.m.Y'),    
                Forms\Components\TextInput::make('geburtsort')
                    ->maxLength(255),
                Forms\Components\TextInput::make('straße')
                    ->maxLength(255),
                Forms\Components\TextInput::make(name:'plz')
                ->label(label:'PLZ')
                ->numeric()
                ->required()
                ->maxLength(10), 
                Forms\Components\TextInput::make('ort')
                    ->maxLength(255),
                Forms\Components\TextInput::make('land')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('profileimg')->label(label:'Foto hochladen')->image()->required()->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                    return (string) str($file->getClientOriginalName())->prepend(now()->timestamp);
                }), 
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
              
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([ 
                    Tables\Columns\ImageColumn::make('profileimg')->grow(false),
                    Tables\Columns\TextColumn::make('name')->searchable(),
                    Tables\Columns\TextColumn::make('vorname')->searchable(), 
                ]),
                Panel::make([
                    Stack::make([
                Tables\Columns\TextColumn::make('email')->icon(icon:'heroicon-o-mail')->searchable(),
                Tables\Columns\TextColumn::make('handynummer')->icon(icon:'heroicon-o-phone'),              
                Tables\Columns\TextColumn::make('ort')->icon(icon:'heroicon-o-home'),             
                Tables\Columns\TextColumn::make('token')->icon(icon:'heroicon-o-hashtag'),
                Tables\Columns\TextColumn::make('created_at')->icon(icon:'heroicon-o-clock')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->icon(icon:'heroicon-o-refresh')
                    ->dateTime(),
                ]),
                ])->collapsible(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make(name:'Email_Token')->icon(icon:'heroicon-o-mail')->action(function(Profile $record){
                    $proEmail=$record->email;
                    User::whereEmail($proEmail)->first()->sendLoginLink();
                }),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
            RelationGroup::make('Lebenslauf', [
            RelationManagers\ExperiencesRelationManager::class,
            RelationManagers\EducationsRelationManager::class,
            RelationManagers\LanguagesRelationManager::class,
            ]),
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
            
           
        ];
    }    
}
