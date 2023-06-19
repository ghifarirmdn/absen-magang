<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use DateTimeZone;

use App\Models\User;
use App\Models\Presence;

class HomeController extends Controller
{
    public function home()
    {
        $timezone = 'Asia/Jakarta';
        $date_time = new DateTime('now', new DateTimeZone($timezone));
        $date = $date_time->format('Y-m-d');
        $user = User::where('id', Auth::id());
        $presence = Presence::where(
            ['id', $user->id],
            ['date', $date]
        )->get();

        if (Auth::user()->role == false)
            return view('user.home', compact('presence'));
        return view('admin.home');
    }
}
