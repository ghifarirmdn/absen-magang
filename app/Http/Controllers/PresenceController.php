<?php

namespace App\Http\Controllers;

use Phar;
use DateTime;
use DateTimeZone;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Office;
use App\Models\Presence;
use App\Traits\TakePhoto;
use App\Models\Performance;
use Illuminate\Http\Request;
use App\Exports\PresenceExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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
        $data = Office::where('user_id', Auth::id())->first();

        $timezone = 'Asia/Jakarta';
        $date_time = new DateTime('now', new DateTimeZone($timezone));
        $date = $date_time->format('Y-m-d');
        $time = $date_time->format('H:i:s');

        $on_time = false;

        if ($time <= '08:00:00')
            $on_time = true;

        $photo = $this->takePicture($request->photo);
        $presence = new Presence([
            'user_id' => $user->id,
            'status' => $request->status,
            'date' => $date,
            'in' => $time,
            'photo' => $photo,
            'is_on_time' => $on_time
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
        $performance = Performance::where('user_id', $presence->user_id)->first();
        $total_presence = $performance->total_presence;

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

        $total_presence += 1;

        $performance->update([
            'total_presence' => $total_presence
        ]);

        return redirect()->route('home');
    }

    public function exportExcel()
    {
        return Excel::download(new PresenceExport, 'presence.xlsx');
    }

    public function recap()
    {
        $presences = Presence::all();

        return view('admin.presence_recap', compact('presences'));
    }
}
