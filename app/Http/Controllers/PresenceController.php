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

        //Cek apakah hari ini sudah presensi atau belum
        if (isset($presence->date))
            return redirect()->back();
        else
            return view('user.presence', compact('presence'));
    }

    public function store(Request $request)
    {
        $user = User::where('id', Auth::id())->first();

        $timezone = 'Asia/Jakarta';
        $date_time = new DateTime('now', new DateTimeZone($timezone));
        $date = $date_time->format('Y-m-d');
        $time = $date_time->format('H:i:s');

        $photo = $request->photo;

        if (isset($photo)) {
            list($type, $data) = explode(';', $photo);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            $type = explode(';', $photo)[0];
            $type = explode('/', $type)[1];

            $filename = Str::random(10) . '_' . time() . '.' . $type;
            $path = public_path() . '/img/' . $filename;
            $photo = 'img/' . $filename;
            file_put_contents($path, $data);
        }

        $presence = new Presence([
            'user_id' => $user->id,
            'status' => $request->status,
            'date' => $date,
            'in' => $time,
            'photo' => $photo
            //traits takePhoto
        ]);

        // if (isset($presence->in)) {
        //     // $photo = $request->photo;

        //     // if ($photo) {
        //     //     list($type, $data) = explode(';', $photo);
        //     //     list(, $data)      = explode(',', $data);
        //     //     $data = base64_decode($data);

        //     //     $type = explode(';', $photo)[0];
        //     //     $type = explode('/', $type)[1];

        //     //     $filename = Str::random(10) . '_' . time() . '.' . $type;
        //     //     $path = public_path() . '/img/' . $filename;
        //     //     $presence->photo = 'img/' . $filename;
        //     //     file_put_contents($path, $data);

        //     //     $presence = Presence::create([
        //     //         'user_id' => Auth::id(),
        //     //         'date' => $date,
        //     //         'in' => $time,
        //     //         'photo' => $photo //traits takePhoto
        //     //     ]);

        //     return redirect()->route('home');
        // } elseif (!isset($presence->out)) {
        //     $update = $presence->update([
        //         'out' => $time
        //     ]);

        //     if ($update) {
        //         Session::flash('message', 'Presensi keluar berhasil!');
        //         Session::flash('alert-class', 'alert-success');
        //         return redirect()->route('home');
        //     } else {
        //         Session::flash('message', 'Gagal melakukan presensi!');
        //         Session::flash('alert-class', 'alert-danger');
        //     }
        //     return redirect()->back();
        // } else
        //     return redirect()->route('home');

        if($presence)
            return view('user.home');
        else
            dd('Error Masbro');
    }
}
