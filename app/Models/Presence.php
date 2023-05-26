<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'status', 'photo', 'ip_address'];

    public function Users()
    {
        return $this->belongsTo(User::class);
    }
}
