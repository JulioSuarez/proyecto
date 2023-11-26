<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Widgets;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use App\Models\Producto as Productos;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductosResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\ProductosResource\RelationManagers;

class ProductosResource extends Resource
{
    protected static ?string $model = Productos::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->autofocus()
                    ->required()
                    ->maxLength(255)
                    ->unique()
                    ->placeholder('Nombre del producto'),
                Forms\Components\Textarea::make('descripcion')
                    ->maxLength(512)
                    ->placeholder('Descripción del producto'),
                Forms\Components\TextInput::make('precio')
                    ->numeric()
                    ->inputMode('decimal')
                    ->required()
                    ->minValue(0)
                    ->maxValue(9999999999)
                    ->placeholder('Precio del producto'),
                Forms\Components\TextInput::make('stock')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->maxValue(2000)
                    ->placeholder('Stock del producto'),
                Forms\Components\Select::make('categoria_id')
                    ->relationship('categoria', 'descripcion')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('descripcion')
                            ->required()
                            ->unique()
                            ->placeholder('Nombre de la categoría'),
                    ])
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('descripcion')
                    ->searchable()
                    ->words(3)
                    ->sortable(),
                TextColumn::make('precio')
                    ->money('BOB')
                    ->numeric(
                        decimalPlaces: 2,
                        decimalSeparator: ',',
                        thousandsSeparator: '.',
                    )
                    ->searchable()
                    ->sortable(),
                TextColumn::make('stock')
                    ->numeric(
                        decimalPlaces: 2,
                        decimalSeparator: ',',
                        thousandsSeparator: '.',
                    )
                    ->searchable()
                    ->sortable(),
                TextColumn::make('categoria.descripcion')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('Categorias')
                    ->relationship('categoria', 'descripcion')
                    ->placeholder('Todas las categorías'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                ExportBulkAction::make(),
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
            'index' => Pages\ListProductos::route('/'),
            'create' => Pages\CreateProductos::route('/create'),
            'edit' => Pages\EditProductos::route('/{record}/edit'),
        ];
    }
}
