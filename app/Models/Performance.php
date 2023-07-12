<?php

namespace App\Models;

use App\Models\User;
use App\Models\Office;
use App\Models\Presence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Performance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'office_id',
        'presence_id',
        'total_presence',
        'total_permit',
        'recap_hours',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function presence()
    {
        return $this->belongsTo(Presence::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

}
