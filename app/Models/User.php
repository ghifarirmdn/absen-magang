<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function Presences()
    {
        return $this->hasMany(Presence::class, 'user_id');
    }
}
