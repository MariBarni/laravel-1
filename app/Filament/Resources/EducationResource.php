<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationResource\Pages;
use App\Filament\Resources\EducationResource\RelationManagers;
use App\Models\Education;
use App\Models\Profile;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Closure;


class EducationResource extends Resource
{
    protected static ?string $model = Education::class;

    protected static ?string $navigationGroup = 'Lebenslauf';
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

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
                    ->afterStateUpdated(function (Closure $set, $state) {
                                     $set('finished_at', null);
                                 })
                    ->reactive()
                    ->nullable(),
                Forms\Components\DatePicker::make(name:'started_at')
                    ->label(label:'Von')
                    ->required()->columns(2)->columnSpan(2)->displayFormat('d.m.Y'),
                Forms\Components\DatePicker::make(name:'finished_at')
                    ->label(label:'Bis')->afterOrEqual('started_at')
                    ->hidden(fn ($get) => $get('currente'))
                    ->nullable()
                    ->withoutTime()->columns(2)->columnSpan(2)->displayFormat('d.m.Y'),                
                Forms\Components\Select::make('profile_id')
                    ->relationship('profile', 'full_name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('abschluss'),
                Tables\Columns\TextColumn::make('bildungseinrichtung'),
                Tables\Columns\TextColumn::make('fachrichtung'),
                Tables\Columns\TextColumn::make('orth'),
               
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
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEducation::route('/'),
            'create' => Pages\CreateEducation::route('/create'),
            'edit' => Pages\EditEducation::route('/{record}/edit'),
        ];
    }    
}
