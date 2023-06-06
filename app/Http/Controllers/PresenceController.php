<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;

use App\Models\User;
use App\Models\Presence;
use App\Http\Traits\TakePhoto;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PresenceController extends Controller
{
    public function create()
    {
        $presence = Presence::where('user_id', Auth::id())->first();

        //Cek apakah hari ini sudah presensi atau belum
        if ($presence->date ?? '')
            return redirect()->route('home');
        else
            return view('user.presence', compact('presence'));
    }

    public function store(Request $request, User $user)
    {
        $presence = Presence::where('user_id', $user->id)->first();

        $timezone = 'Asia/Jakarta';
        $date_time = new DateTime('now', new DateTimeZone($timezone));
        $date = $date_time->format('Y-m-d');
        $time = $date_time->format('H:i:s');

        if ($presence->in == '') {
            $presence = new Presence([
                'user_id' => $user->id,
                'date' => $date,
                'in' => $time,
                'photo' => $this->takePicture($presence, $request->photo) //traits takePhoto
            ]);
        } elseif ($presence->out == '') {
            $update = $presence->update([
                'out' => $time
            ]);

            if ($update) {
                Session::flash('message', 'Presensi keluar berhasil!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('home');
            } else {
                Session::flash('message', 'Gagal melakukan presensi!');
                Session::flash('alert-class', 'alert-danger');
            }
            return redirect()->back();
        } else
            return redirect()->route('home');
    }
}
