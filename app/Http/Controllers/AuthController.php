<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use DateTimeZone;

use App\Models\User;
use App\Models\Presence;
use DateTime;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function actionLogin(Request $req)
    {
        $timezone = 'Asia/Jakarta';
        $date_time = new DateTime('now', new DateTimeZone($timezone));
        $date = $date_time->format('Y-m-d');

        $data = [
            'email' => $req->email,
            'password' => $req->password,
        ];

        $presence = Presence::where('user_id', '=', Auth::id())->first();

        if (Auth::attempt($data)) {
            if ($presence->date ?? $date)
                return Redirect::route('presence');
            else
                return Redirect::route('home');
        } else
            return Redirect::route('login');
        if (Auth::attempt($data)) {
            $user = Auth::user();
            $presence = Presence::where('user_id', $user->id)->first();
            $check_in = Presence::whereNull('check_in');
            $check_out = Presence::whereNull('check_out');
            
            return view('user.home', compact('presence', 'check_in', 'check_out'));
        }
        
        // if (Auth::attempt($data)) {
        //     $user = Auth::user();
        //     $value = Presence::where('user_id', $user->id)->where('date', now()->format('Y-m-d'))->whereNull('check_in')->first();
        //     if($value)
        //     {
        //         $hasil = 'benar';
        //         return  view('user.home', compact('hasil'));
        //     }
        //     $hasil = 'salah';
        //     return  view('user.home', compact('hasil'));
        // }
        
        return Redirect::route('home');
    }

    public function register()
    {
        return view('register');
    }

    public function createUser(Request $req)
    {
        $user = new User();

        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();

        return Redirect::route('login');
    }

    public function logOut()
    {
        $timezone = 'Asia/Jakarta';
        $date_time = new DateTime('now', new DateTimeZone($timezone));
        $date = $date_time->format('Y-m-d');

        $presence = Presence::where([
            ['user_id', '=', Auth::id()],
            ['date', '=', $date]
        ])->first();

        if ($presence->check_out != '') {
            Auth::logout();

            return Redirect::route('login');
        } else
            return Redirect::route('presence');
    }
}
