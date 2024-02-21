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

class EducationsRelationManager extends RelationManager
{
    protected static string $relationship = 'educations';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(name:'abschluss')
                    ->label(label:'Abschluss')
                    ->minLength(2)->maxLength(255)->required()->placeholder('z. B. Mittlere Reife oder Abitur'),
                Forms\Components\TextInput::make(name:'bildungseinrichtung')
                    ->label(label:'Bildungseinrichtung')
                    ->minLength(2)->maxLength(255)->required()->placeholder('Name der Schule'),
                Forms\Components\TextInput::make(name:'fachrichtung')
                    ->label(label:'Fachrichtung')
                    ->minLength(2)->maxLength(255),
                Forms\Components\TextInput::make(name:'orth')
                    ->label(label:'Ort')
                    ->minLength(2)->maxLength(255)->required(),                            
                Forms\Components\Checkbox::make(name:'currente')
                    ->label(label:'Bis heute')
                    ->afterStateUpdated(function (Livewire $livewire, Closure $set,  $state, Closure $get) {
                        $set('finished_at', null);
                        })->reactive()->nullable(),
                Forms\Components\DatePicker::make(name:'started_at')
                    ->label(label:'Von')
                    ->required()->columns(2) ->columnSpan(2)->displayFormat('d.m.Y'),
                Forms\Components\DatePicker::make(name:'finished_at')
                    ->label(label:'Bis')->afterOrEqual('started_at')
                    ->hidden(fn ($get) => $get('currente'))
                    ->nullable()
                    ->withoutTime()->columns(2) ->columnSpan(2)->displayFormat('d.m.Y'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make(name:'abschluss')
                ->label(label:'Abschluss'),
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
