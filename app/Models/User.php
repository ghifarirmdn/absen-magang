<?php

namespace App\Models;

use App\Models\Presence;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function presences()
    {
        return $this->hasMany(Presence::class, 'user_id');
    }

    public function perfomances()
    {
        return $this->hasMany(Perfromance::class, 'user_id');
    }

    public function permissions()
    {
        return $this->hasMany(Perfromance::class, 'user_id');
    }

    public function office()
    {
        return $this->hasOne(Office::class);
    }
}
