<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user) {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'initials' => 'required|string|max:255',
            'prefix' => 'required|string|max:255',
            'last_name' => 'required|string|max:255'
        ]);

        $user->update([
            'initials' => $request->initials,
            'prefix' => $request->prefix,
            'last_name' => $request->last_name
        ]);

        if ($request->password) {
            $request->validate([ 'password' => 'string|min:6|confirmed' ]);
            $user->update([ 'password' => Hash::make($request->password) ]);
        }

        return redirect(route('users.index'));
    }

    public function delete(User $user) {
        $user->delete();
        return redirect(route('users.index'));
    }
}
