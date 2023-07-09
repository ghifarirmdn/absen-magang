<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Presence;
use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
        $date = Carbon::now()->format('Y-m-d');

        if (Auth::user()->is_admin == false) {
            $presences = Presence::where('user_id', Auth::id())->get();
            $presence_today = Presence::where('date', $date)->first()->get();

            return view('user.home', compact('presences', 'presence_today'));
        } else {
            $presences = Presence::all();

            return view('admin.home', compact('presences'));
        }
    }
}
