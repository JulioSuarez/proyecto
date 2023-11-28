<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Invoice;
use Illuminate\Support\Str;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\InvoiceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Producto as Product;

use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema([
                                TextInput::make('invoice_number')->default('1')->required(),
                                DatePicker::make('invoice_date')->default(now())->required(),
                            ])->columns([
                                'sm' => 2,
                            ]),
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\Placeholder::make('Productos'),
                                Forms\Components\Repeater::make('invoiceItems')
                                    ->relationship()
                                    ->schema([
                                        Forms\Components\Select::make('product_id')
                                            ->relationship('product', 'name')
                                            ->label('Producto')
                                            ->options(Product::query()->pluck('name', '_id'))
                                            ->required()
                                            ->reactive()
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                $product = Product::find($state);
                                                if ($product) {
                                                    $set('price', number_format($product->price, 2));
                                                    $set('product_price', $product->price);
                                                }
                                            })
                                            ->columnSpan([
                                                'md' => 5
                                            ]), Forms\Components\TextInput::make('product_amount')
                                            ->numeric()
                                            ->default(1)
                                            ->required()
                                            ->columnSpan([
                                                'md' => 2
                                            ]),
                                        Forms\Components\TextInput::make('price')
                                            ->disabled()
                                            ->numeric()
                                            ->default(1)
                                            ->dehydrated(false)
                                            ->columnSpan([
                                                'md' => 3
                                            ]),
                                        Forms\Components\Hidden::make('product_price')
                                            ->disabled()
                                    ])
                                    ->defaultItems(1)
                                    ->columns([
                                        'md' => 10
                                    ])
                                    ->columnSpan('full')
                            ]),
                    ])->columnSpan('full')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('invoice_date')->date()->sortable()->searchable(),
                TextColumn::make('invoice_number')->sortable()->searchable(),
                TextColumn::make('user.name')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
