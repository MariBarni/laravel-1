<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DesignResource\Pages;
use App\Filament\Resources\DesignResource\RelationManagers;
use App\Models\Design;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DesignResource extends Resource
{
    protected static ?string $model = Design::class;
    protected static ?string $navigationGroup = 'Back-end';
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-s-pencil';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('dname')->label(label:'Design Name')->minLength(2)->maxLength(255)->required(),
                Forms\Components\TextInput::make('template')->label(label:'Template Name')->minLength(2)->maxLength(255)->required(),
                FileUpload::make('designimg')->label(label:'Foto hochladen')->image()->required()->preserveFilenames()->directory('public/templa'),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('dname')->label(label:'Design Name'),
                Tables\Columns\TextColumn::make('template')->label(label:'Template Name'),
                Tables\Columns\ImageColumn::make('designimg')->label(label:'Preview Bild '),
                //
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
            ])
            ->reorderable('dname');
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageDesigns::route('/'),
        ];
    }    
}
