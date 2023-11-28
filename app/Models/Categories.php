<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// para la api
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Sushi\Sushi;


class Categories extends Model
{
    use HasFactory;
    use Sushi;

    public function getRows()
    {
        //API
        $categories = Http::get('https://microservicioproduct.onrender.com/api/categories')->json();

        //filtering some attributes
        $categories = Arr::map($categories['categories'], function ($item) {
            return Arr::only($item,
                [
                    '_id',
                    'name',
                ]
            );
        });

        return $categories;
    }

    protected $fillable = [
        '_id',
        'name',
    ];

    public function getTable()
    {
        return 'categories';
    }
}
