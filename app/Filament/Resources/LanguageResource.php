<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LanguageResource\Pages;
use App\Filament\Resources\LanguageResource\RelationManagers;
use App\Models\Language;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Profile;

class LanguageResource extends Resource
{
    protected static ?string $model = Language::class;
    protected static ?string $navigationGroup = 'Lebenslauf';
    protected static ?int $navigationSort = 4;

    protected static ?string $navigationIcon = 'heroicon-o-translate';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(name:'language')
                    ->label(label:'')->required()->minLength(2)
                    ->maxLength(255)->placeholder('Sprache hinzufügen'),
                    Forms\Components\Select::make(name:'level')
                    ->label(label:'')->placeholder('Sprachkenntnisse wählen')
                    ->options([
                    '-' => '-',
                    'Grundlagen' => 'Grundlagen',
                    'Gut' => 'Gut',
                    'Fließend' => 'Fließend',
                    'Muttersprache' => 'Muttersprache',
                ])
                ->required(),
                    Forms\Components\Select::make('profile_id')
                    ->relationship('profile', 'full_name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('language'),
                Tables\Columns\TextColumn::make('level'),
                Tables\Columns\TextColumn::make('profile.name'),
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
            'index' => Pages\ListLanguages::route('/'),
            'create' => Pages\CreateLanguage::route('/create'),
            'edit' => Pages\EditLanguage::route('/{record}/edit'),
        ];
    }    
}
