<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;

use App\Models\User;
use App\Models\Presence;
use App\Traits\TakePhoto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresenceController extends Controller
{
    use TakePhoto;

    public function create()
    {
        $timezone = 'Asia/Jakarta';
        $date_time = new DateTime('now', new DateTimeZone($timezone));
        $date = $date_time->format('Y-m-d');

        $presence = Presence::where('user_id', Auth::id())
        ->where('date', $date)
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
        $start = $presence->in;

        $break_1 = Carbon::createFromFormat('H:i:s', $start);
        $break_2 = Carbon::createFromFormat('H:i:s', $time);

        $total_hours = $break_2->diffInHours($break_1);

        $presence->update([
            'out' => $time,
            'total_hours' => $total_hours
        ]);

        return redirect()->route('home');
    }
}
