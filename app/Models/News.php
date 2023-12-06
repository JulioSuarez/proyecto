<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'expression',
        'route_path',
        'avatar_id',
        'gender',
        'program_id',
        'sort',
    ];

    public function program()
    {
        return $this->belongsTo(Programs::class, 'program_id');
    }

    public function avatar()
    {
        return $this->belongsTo(Avatars::class, 'avatar_id');
    }

}
