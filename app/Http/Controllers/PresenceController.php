<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Presence;

class PresenceController extends Controller
{
    public function create()
    {
        return view('user.presence');
    }

    public function store(Request $request)
    {
        $presence = new Presence([
            'user_id' => Auth::id(),
            'in' => $request->date,
        ]);
    }
}
