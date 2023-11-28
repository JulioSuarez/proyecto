<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// para la api
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Sushi\Sushi;


class Suppliers extends Model
{
    use HasFactory;
    use Sushi;

    public function getRows()
    {
        //API
        $suppliers = Http::get('https://microservicioproduct.onrender.com/api/suppliers')->json();

        //filtering some attributes
        $suppliers = Arr::map($suppliers['suppliers'], function ($item) {
            return Arr::only($item,
                [
                    '_id',
                    'name',
                    'phone',
                    'mail'
                ]
            );
        });

        return $suppliers;
    }

    protected $fillable = [
        '_id',
        'name',
        'phone',
        'mail'
    ];

    public function getTable()
    {
        return 'suppliers';
    }

    public function producto()
    {
        return $this->hasMany(Producto::class);
    }

    public function getSupplierIdAttribute()
    {
        return $this->attributes['_id'];
    }

    
}
