<?php

namespace App\Http\Controllers;

use DateTime;

use DateTimeZone;
use App\Models\Presence;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $timezone = 'Asia/Jakarta';
        $date_time = new DateTime('now', new DateTimeZone($timezone));
        $date = $date_time->format('Y-m-d');

        if (Auth::user()->is_admin == false) {
            $presences = Presence::where('user_id', Auth::id())->get();
            $presence_today = Presence::where('date', $date)->get();

            return view('user.home', compact('presences', 'presence_today'));
        } else {
            $presences = Presence::all();

            return view('admin.home', compact('presences'));
        }
    }
}
