<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function coba()
    {
        $value = Presence::where('user_id', 13)->where('date', now()->format('Y-m-d'))->whereNull('check_in')->first();
        if($value)
        {
            $hasil = 'benar';
            return  view('user.home', compact('$hasil'));
        }else{
            $hasil = 'salah';
            return  view('user.home', compact('$hasil'));
        }
    }
}
