<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperienceResource\Pages;
use App\Filament\Resources\ExperienceResource\RelationManagers;
use App\Models\Experience;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Closure;
use App\Models\Profile;

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(name:'jname')->label(label:'Positionsbezeichnung')->minLength(2)->maxLength(255)->required(),
                Forms\Components\TextInput::make(name:'cnname')->label(label:'Unternehmen')->minLength(2)->maxLength(255)->required(),
                Forms\Components\Textarea::make(name:'description')
                    ->label(label:'Beschreibung')->rows(3)
                    ->cols(20)->columnSpan(2),
                Forms\Components\Checkbox::make(name:'currentj')->label(label:'Bis heute')
                    ->afterStateUpdated(function (Closure $set, $state) {
                        $set('finished_at', null);
                        })->reactive()->nullable(),
                Forms\Components\DatePicker::make(name:'started_at')->label(label:'Von')
                    ->required()->columns(2) ->columnSpan(2),
                Forms\Components\DatePicker::make(name:'finished_at')->label(label:'Bis')->afterOrEqual('started_at')
                    ->hidden(fn ($get) => $get('currentj'))
                    ->nullable()->withoutTime()->columns(2) ->columnSpan(2),
                Forms\Components\Select::make('profile_id')
                    ->relationship('profile', 'full_name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jname'),
                Tables\Columns\TextColumn::make('cnname'),
                Tables\Columns\TextColumn::make('description'),
           
                Tables\Columns\TextColumn::make('started_at')
                    ->date(),
                Tables\Columns\TextColumn::make('finished_at')
                    ->date(),
                
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
            'index' => Pages\ListExperiences::route('/'),
            'create' => Pages\CreateExperience::route('/create'),
            'edit' => Pages\EditExperience::route('/{record}/edit'),
        ];
    }    
}
