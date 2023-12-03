<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'title',
        'expression',
        'route_path',
        'name',
        'avatar_id',
        'program_id',
    ];

    public function program()
    {
        return $this->belongsTo(Programs::class);
    }

    public function avatar()
    {
        return $this->belongsTo(Avatars::class);
    }

}
