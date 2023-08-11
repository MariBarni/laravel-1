<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfileRelationManager extends RelationManager
{
    protected static string $relationship = 'profile';

    

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
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
