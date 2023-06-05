<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillale = [
        'category',
        'information'
    ];

    public function presence()
    {
        return $this->belongsTo(Presence::class);
    }
}
