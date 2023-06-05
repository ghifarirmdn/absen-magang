<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Presence;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresenceController extends Controller
{
    public function create()
    {
        return view('user.presence');
    }

    public function store(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date_time = new DateTime('now', new DateTimeZone($timezone));
        $date = $date_time->format('Y-m-d');
        $time = $date_time->format('H:i:s');

        $presence = new Presence([
            'user_id' => Auth::id(),
            'date' => $date,
            'in' => $time,
        ]);
    }
}
