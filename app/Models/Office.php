<?php

namespace App\Models;

use App\Models\Performance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'working_status',
        'working_hours',
        'entry_hours',
        'target',
        'holidays',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function performances()
    {
        return $this->hasMany(Performance::class);
    }
}
