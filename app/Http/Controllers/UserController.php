<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use App\Models\Performance;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', false)->get();

        return view('admin.users', compact('users'));
    }

    public function create()
    {
        return view('admin.user_create');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin
        ]);

        $user = User::get()->last();

        Office::create([
            'user_id' => $user->id,
            'working_status' => $request->working_status,
            'is_fixed_entry' => $request->working_hours,
            'entry_hours' => $request->entry_hours,
            'target' => $request->target,
            'holidays' => $request->holidays,
        ]);

        Performance::create([
            'user_id' => $user->id
        ]);

        return redirect()->route('home');
    }

    public function show(User $user)
    {
        return view('admin.user_show', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('users');
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('home');
    }
}
