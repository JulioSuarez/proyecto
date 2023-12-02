<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatars extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_path',
        'name',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
