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
        $presence = Presence::where('user_id', Auth::id())
            ->where('date', now()->date)
            ->first();

        return view('user.presence', compact('presence'));
    }

    public function store(Request $request)
    {
        $user = User::where('id', Auth::id())->first();

        $timezone = 'Asia/Jakarta';
        $date_time = new DateTime('now', new DateTimeZone($timezone));
        $date = $date_time->format('Y-m-d');
        $time = $date_time->format('H:i:s');

        $photo = $this->takePicture($request->photo);
        $presence = new Presence([
            'user_id' => $user->id,
            'status' => $request->status,
            'date' => $date,
            'in' => $time,
            'photo' => $photo
        ]);

        $presence->save();

        return redirect()->route('home');
    }

    public function edit(Presence $presence)
    {
        return view('user.presence', compact('presence'));
    }

    public function update(Presence $presence)
    {
        $timezone = 'Asia/Jakarta';
        $date_time = new DateTime('now', new DateTimeZone($timezone));
        $time = $date_time->format('H:i:s');

        $presence->update([
            'out' => $time
        ]);

        return redirect()->route('home');
    }
}
