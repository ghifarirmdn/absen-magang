<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;

use App\Models\Presence;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $date = Carbon::now()->format('Y-m-d');

        if (Auth::user()->is_admin == false) {
            $presences = Presence::where('user_id', Auth::id())->get();
            $presence_today = Presence::where('user_id', Auth::id())
                ->where('date', $date)
                ->first();

            $permission = Permission::where('user_id', Auth::id())
                ->where('date', $date)
                ->first();

            return view('user.home', compact('presences', 'presence_today', 'permission'));
        } else {
            $presences = Presence::all();
            $users = User::where('is_admin', false)->get();
            $total_user = User::all()->count();
            $total_presence = Presence::all()->count();

            return view('admin.home', compact('presences', 'users', 'total_user', 'total_presence'));
        }
    }
}
