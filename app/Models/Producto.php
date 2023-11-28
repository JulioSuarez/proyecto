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
        // $products = Http::get('https://dummyjson.com/products')->json();
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

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function detalleVenta(): HasMany
    {
        return $this->hasMany(detalleVenta::class);
    }

    public function venta(): HasMany
    {
        return $this->hasMany(Venta::class);
    }

    public function getTable()
    {
        return 'products';
    }
    
}
// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;

// class Producto extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'nombre',
//         'descripcion',
//         'precio',
//         'categoria_id',
//     ];

//     public function categoria(): BelongsTo
//     {
//         return $this->belongsTo(Categoria::class);
//     }
// }
