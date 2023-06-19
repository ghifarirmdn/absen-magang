<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;

use App\Models\User;
use App\Models\Presence;
use App\Traits\TakePhoto;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PresenceController extends Controller
{
    use TakePhoto;
    
    public function create()
    {
        $presence = Presence::where('user_id', Auth::id())->first();

        return view('user.presence_in', compact('presence'));
    }

    public function store(Presence $presence, Request $request)
    {
        $user = User::where('id', Auth::id())->first();

        $photo = $this->takePicture($request->photo);

        $timezone = 'Asia/Jakarta';
        $date_time = new DateTime('now', new DateTimeZone($timezone));
        $date = $date_time->format('Y-m-d');
        $time = $date_time->format('H:i:s');

        if (!isset($presence->in))
            $presence = new Presence([
                'user_id' => $user->id,
                'status' => $request->status,
                'date' => $date,
                'in' => $time,
                'photo' => $photo
            ]);

        if ($presence->save())
            return view('user.home');
        else
            dd('Error Masbro');
    }

    public function edit()
    {
        $presence = Presence::where('user_id', Auth::id())->first();

        return view('user.presence_out', compact('presence'));
    }

    public function update(Presence $presence)
    {
        $timezone = 'Asia/Jakarta';
        $date_time = new DateTime('now', new DateTimeZone($timezone));
        $time = $date_time->format('H:i:s');

        $presence->update([
            'out' => $time
        ]);

        return view('user.home');
    }
}
