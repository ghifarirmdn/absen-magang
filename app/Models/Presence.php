<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'photo'];

    public function Users()
    {
        return $this->belongsTo(User::class);
    }
}
