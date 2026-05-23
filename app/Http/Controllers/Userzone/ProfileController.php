<?php

namespace App\Http\Controllers\Userzone;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('userzone.profile.edit', [
            'user' => auth()->user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'username' => ['nullable', 'string', 'max:255'],
            'birthday' => ['nullable', 'date'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'profile_photo' => ['nullable', 'image', 'max:2048'],
        ]);

        $user->name = $request->name;

        if ($user->email !== $request->email) {
            $user->email_verified_at = null;
        }

        $user->email = $request->email;
        $user->username = $request->username;
        $user->birthday = $request->birthday;
        $user->bio = $request->bio;

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $user->profile_photo = $path;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    public function show($id)
    {
        $user = User::find($id);

        if (! $user) {
            return 'Gebruiker niet gevonden.';
        }

        return view('userzone.profile.show', compact('user'));
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required'],
        ]);

        $user = auth()->user();

        if (! password_verify($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Wachtwoord is onjuist.'], 'userDeletion');
        }

        Auth::logout();
        $user->delete();

        return redirect('/');
    }
}
