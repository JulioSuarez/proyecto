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


//stripe metodos de pago
use Laravel\Cashier\Billable;
use function Illuminate\Events\queueable; //actualizar cambios en stripe

class User extends Authenticatable implements FilamentUser
// class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Billable;
    // use Sushi;

    public function canAccessPanel(Panel $panel): bool
    {
        // return str_ends_with($this->email, '@gmail.com');
        return true;
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
        'credits'
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


    // programs
    public function programs()
    {
        return $this->hasMany(Programs::class);
    }

    // avatars
    public function avatars()
    {
        return $this->hasMany(Avatars::class);
    }

    // metodo de stripe para actualizar datos de cliente
    protected static function booted(): void
    {
        static::updated(queueable(function (User $customer) {
            if ($customer->hasStripeId()) {
                $customer->syncStripeCustomerDetails();
            }
        }));
    }

    public function newsCreated(){
        $programs = Programs::where('user_id', auth()->user()->id)->pluck('id');
        $news = News::whereIn('program_id', $programs)->count();
        return $news;
    }
}
