<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AreaResource\Pages;
use App\Filament\Resources\AreaResource\RelationManagers;
use App\Models\Area;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AreaResource extends Resource
{
    protected static ?string $model = Area::class;

    protected static ?string $navigationGroup = 'Gestão';

    protected static ?string $navigationIcon = 'heroicon-o-puzzle';


    protected static ?string $label = "Áreas";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nome')
                    ->maxLength(40)
                    ->required(),
                TextInput::make('price')
                    ->label('Preço')
                    ->numeric()
                    ->step(0.01)
                    ->required(),
                TextInput::make('duration')
                    ->label('Duração (minutos)')
                    ->numeric()
                    ->required(),
                Select::make('users')
                    ->label('Médicos')
                    ->multiple()
                    ->relationship('users', 'name')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nome'),
                TextColumn::make('price')->label('Preço')
                    ->formatStateUsing(fn ($state) => $state . "€"),
                TextColumn::make('duration')->label('Duração')
                    ->formatStateUsing(fn ($state) => $state . " minutos"),
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
            'index' => Pages\ListAreas::route('/'),
            'create' => Pages\CreateArea::route('/create'),
            'edit' => Pages\EditArea::route('/{record}/edit'),
        ];
    }
}
