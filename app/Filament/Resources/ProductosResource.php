<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Widgets;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use App\Models\Producto as Product;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductosResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\ProductosResource\RelationManagers;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;

use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;

class ProductosResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('name'),
                TextInput::make('brand'),
                TextInput::make('amount'),
                TextInput::make('minimum_amount'),
                TextInput::make('price')
                    ->prefix('$'),
                TextInput::make('unit'),
                TextInput::make('categoryId'),
                TextInput::make('supplierId'),

                // RichEditor::make('description'),


                // TextInput::make('nombre')
                //     ->autofocus()
                //     ->required()
                //     ->maxLength(255)
                //     ->unique()
                //     ->placeholder('Nombre del producto'),
                // Textarea::make('descripcion')
                //     ->maxLength(512)
                //     ->placeholder('Descripción del producto'),
                // TextInput::make('precio')
                //     ->numeric()
                //     ->inputMode('decimal')
                //     ->required()
                //     ->minValue(0)
                //     ->maxValue(9999999999)
                //     ->placeholder('Precio del producto'),
                // TextInput::make('stock')
                //     ->numeric()
                //     ->required()
                //     ->minValue(0)
                //     ->maxValue(2000)
                //     ->placeholder('Stock del producto'),
                // Select::make('categoria_id')
                //     ->relationship('categoria', 'descripcion')
                //     ->searchable()
                //     ->preload()
                //     ->createOptionForm([
                //         TextInput::make('descripcion')
                //             ->required()
                //             ->unique()
                //             ->placeholder('Nombre de la categoría'),
                //     ])
                //     ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // //thumbnail
                // ImageColumn::make('thumbnail')
                //     ->label('Image')
                //     ->rounded(),

                //title
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->alignLeft(),
                TextColumn::make('brand')
                    ->searchable()
                    ->sortable()
                    ->color('secondary')
                    ->alignLeft(),
                TextColumn::make('amount')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('minimum_amount')
                    ->sortable()
                    ->searchable(),
                //price
                BadgeColumn::make('price')
                    ->colors(['secondary'])
                    ->prefix('BOB ')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('unit')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('categoryId')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('supplierId')
                    ->sortable()
                    ->searchable(),




                // //rating
                // BadgeColumn::make('rating')
                //     ->colors([
                //         'danger' => static fn ($state): bool => $state <= 3,
                //         'warning' => static fn ($state): bool => $state > 3 && $state <= 4.5,
                //         'success' => static fn ($state): bool => $state > 4.5,
                //     ])
                //     ->sortable()
                //     ->searchable(),
                // TextColumn::make('nombre')
                //     ->searchable()
                //     ->sortable(),
                // TextColumn::make('descripcion')
                //     ->searchable()
                //     ->words(3)
                //     ->sortable(),
                // TextColumn::make('precio')
                //     ->money('BOB')
                //     ->numeric(
                //         decimalPlaces: 2,
                //         decimalSeparator: ',',
                //         thousandsSeparator: '.',
                //     )
                //     ->searchable()
                //     ->sortable(),
                // TextColumn::make('stock')
                //     ->numeric(
                //         decimalPlaces: 2,
                //         decimalSeparator: ',',
                //         thousandsSeparator: '.',
                //     )
                //     ->searchable()
                //     ->sortable(),
                // TextColumn::make('categoria.descripcion')
                //     ->searchable()
                //     ->sortable(),
            ])
            ->filters([
                //brand
                SelectFilter::make('brand')
                    ->multiple()
                    ->options(
                        Product::select('brand')
                            ->distinct()
                            ->get()
                            ->pluck('brand', 'brand')
                    ),

                //category
                SelectFilter::make('category')
                    ->multiple()
                    ->options(
                        Product::select('category')
                            ->distinct()
                            ->get()
                            ->pluck('category', 'category')
                    ),
                // SelectFilter::make('Categorias')
                //     ->relationship('categoria', 'descripcion')
                //     ->placeholder('Todas las categorías'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
                // ExportBulkAction::make(),
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
