<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category',
        'permission_letter',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
