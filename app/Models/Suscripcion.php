<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;

    //fillable
    protected $fillable = [
        'nombre',
        'precio',
        'stripe_id',
        'foto',

    ];

    //Relacion
   
}
