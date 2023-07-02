<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Presence;

class HomeController extends Controller
{
    public function home()
    {
        $presence = Presence::where('user_id', Auth::id())->first();

        if (Auth::user()->role == false)
            return view('user.home', compact('presence'));
        return view('admin.home');
    }
}
