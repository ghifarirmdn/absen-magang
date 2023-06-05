<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\User;

use App\Models\Presence;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PresenceController extends Controller
{
    public function create(User $user)
    {
        //Cek apakah hari ini sudah presensi atau belum
        if ($user->presence->date == '')
            return view('user.presence', $user);
        else
            return redirect()->route('home');
    }

    public function store(Request $request, User $user)
    {
        $presence = Presence::where('user_id', $user->id)->last()->get();

        $timezone = 'Asia/Jakarta';
        $date_time = new DateTime('now', new DateTimeZone($timezone));
        $date = $date_time->format('Y-m-d');
        $time = $date_time->format('H:i:s');

        if ($presence->in == '') {
            $presence = new Presence([
                'user_id' => $user->id,
                'date' => $date,
                'in' => $time,
            ]);
        } elseif($presence->out == ''){
            $update = $presence->update([
                'out' => $time
            ]);

            if($update){
                Session::flash('message', 'Presensi keluar berhasil!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('home');
            }else{
                Session::flash('message', 'Gagal melakukan presensi!');
                Session::flash('alert-class', 'alert-danger');
            }
            return redirect()->back();
        }else
            return redirect()->route('home');
    }
}
