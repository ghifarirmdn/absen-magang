<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PermissionController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('permission_letter');
        $path = $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/files/' . $path, file_get_contents($file));

        Permission::create([
            'user_id' => Auth::id(),
            'category' => $request->category,
            'permission_letter' => $path,
        ]);

        return redirect()->route('home');
    }
}
