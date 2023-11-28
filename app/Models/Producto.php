<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


// para la api
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Sushi\Sushi;

class Producto extends Model
{
    use HasFactory;
    use Sushi;
    protected $primaryKey = '_id';

    public function getRows()
    {
        //API
        $products = Http::get('https://microservicioproduct.onrender.com/api/products')->json();

        //filtering some attributes
        $products = Arr::map($products['products'], function ($item) {
            return Arr::only($item,
                [
                    '_id',
                    'name',
                    'brand',
                    'amount',
                    'minimum_amount',
                    'price',
                    'unit',
                    'categoryId',
                    'supplierId',
                    '__v'
                ]
            );
        });

        return $products;
    }

    protected $fillable = [
        '_id',
        'name',
        'brand',
        'amount',
        'minimum_amount',
        'price',
        'unit',
        'categoryId',
        'supplierId',
        '__v'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'categoryId');
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Suppliers::class, 'supplierId');
    }

    public function invoiceItems(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    // public function getUnitAttribute($value)
    // {
    //     return strtoupper($value);
    // }

    // public function setUnitAttribute($value)
    // {
    //     $this->attributes['unit'] = strtoupper($value);
    // }

    // public function getAmountAttribute($value)
    // {
    //     return strtoupper($value);
    // }

    public function getTable()
    {
        return 'productos';
    }
}
