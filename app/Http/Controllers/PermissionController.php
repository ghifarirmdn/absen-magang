<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Presence;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PermissionController extends Controller
{
    public function store(Request $request)
    {
        $user = User::where('id', Auth::id())->first();

        $file = $request->file('permission_letter');
        $path = "Permission" . $user->name . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/files/' . $path, file_get_contents($file));

        // dd($user->id);

        Permission::create([
            'user_id' => $user->id,
            'category' => $request->category,
            'permission_letter' => $path,
        ]);

        Presence::create([
            'user_id' => $user->id,
            'total_hours' => '0',
            'status' => $request->category,
            'photo' => $path
        ]);

        return redirect()->route('home');
    }
}
