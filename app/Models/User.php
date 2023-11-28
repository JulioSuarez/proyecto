<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

// para la api
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
// use Sushi\Sushi;

class User extends Authenticatable implements FilamentUser
// class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    // use Sushi;

    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@julicosuarez.tech');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    // invoice

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }


    // public function getRows()
    // {
    //     //API
    //     $users = Http::get('https://microservicioproduct.onrender.com/api/users')->json();

    //     //filtering some attributes
    //     $users = Arr::map($users['users'], function ($item) {
    //         return Arr::only(
    //             $item,
    //             [
    //                 '_id',
    //                 'name',
    //                 'email',
    //                 'password',
    //                 'role',
    //                 'phone',
    //                 'address',
    //                 'city',
    //                 'state',
    //                 'country',
    //                 'postalCode',
    //                 'image',
    //                 'createdAt',
    //                 'updatedAt',
    //                 '__v'
    //             ]
    //         );
    //     });

    //     return $users;
    // }

    public function getTable()
    {
        return 'users';
    }

    // public function getSupplierIdAttribute()
    // {
    //     return $this->attributes['_id'];
    // }

    // public function getRoleAttribute()
    // {
    //     return $this->attributes['role'];
    // }
}
