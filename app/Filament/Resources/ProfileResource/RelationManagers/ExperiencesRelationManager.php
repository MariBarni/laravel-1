<?php

namespace App\Filament\Resources\ProfileResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Closure;
use Livewire\Component as Livewire;


class ExperiencesRelationManager extends RelationManager
{
    protected static string $relationship = 'experiences';

    protected static ?string $recordTitleAttribute = 'jname';

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
                    ->afterStateUpdated(function (Livewire $livewire, Closure $set,  $state, Closure $get) {
                        $set('finished_at', null);
                        })->reactive()->nullable(),
                Forms\Components\DatePicker::make(name:'started_at')->label(label:'Von')
                    ->required()->columns(2) ->columnSpan(2)->displayFormat('d.m.Y'),
                Forms\Components\DatePicker::make(name:'finished_at')->label(label:'Bis')->afterOrEqual('started_at')
                    ->hidden(fn ($get) => $get('currentj'))
                    ->nullable()->withoutTime()->columns(2) ->columnSpan(2)->displayFormat('d.m.Y'),
                 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make(name:'jname')->label(label:'Positionsbezeichnung'),
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
