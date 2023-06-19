<?php

namespace App\Models;

use App\Models\User;
use App\Models\Permission;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'in',
        'out', 
        'status', 
        'photo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function permission()
    {
        return $this->hasOne(Permission::class);
    }
}
