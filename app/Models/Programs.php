<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
