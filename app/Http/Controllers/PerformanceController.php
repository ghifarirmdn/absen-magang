<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Presence;
use App\Models\Performance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $performance = Performance::where('user_id', Auth::id())->first();
        $total_hari = 30 - ($performance->user->office->holidays * 4); //hari belum fleksibel

        $presence = Presence::where('user_id', Auth::id())->first();
        $tepat_waktu = $presence->where('is_on_time', true)->count();
        $terlambat = $presence->where('is_on_time', false)->count();
        $total_jam = $presence->sum('total_hours');

        $bulan_ini = Carbon::now()->isoFormat('MMMM');

        return view('user.performance', compact('performance', 'total_hari', 'tepat_waktu', 'terlambat', 'total_jam', 'bulan_ini'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Performance $performance)
    {
        //
    }
}
