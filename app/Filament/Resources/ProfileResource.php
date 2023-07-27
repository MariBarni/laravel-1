<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
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

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
                Forms\Components\TextInput::make('wunschposition')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('handynummer')
                    ->maxLength(255),
                Forms\Components\DatePicker::make(name:'geburtstag')
                    ->label(label:'Geburtstag')
                    ->displayFormat('d/m/Y')
                    ->minDate(now()->subYears(120))->maxDate(now())->format('d/m/Y'),    
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
                Forms\Components\FileUpload::make('profileimg')->label(label:'Foto hochladen')->image()->required(), 
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
                
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('vorname'),
                Tables\Columns\TextColumn::make('wunschposition'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('handynummer'),
                Tables\Columns\TextColumn::make('geburtstag'),
                Tables\Columns\TextColumn::make('geburtsort'),
                Tables\Columns\TextColumn::make('straße'),
                Tables\Columns\TextColumn::make('plz'),
                Tables\Columns\TextColumn::make('ort'),
                Tables\Columns\TextColumn::make('land'),
                Tables\Columns\TextColumn::make('profileimg'),
                Tables\Columns\TextColumn::make('tags'),
                Tables\Columns\TextColumn::make('token'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
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
