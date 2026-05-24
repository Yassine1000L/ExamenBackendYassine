<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        // wachtwoord hashen met password_hash
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        // checkbox: als aangevinkt wordt is_admin true, anders false
        $user->is_admin = $request->has('is_admin');
        $user->save();

        return redirect('/admin/users');
    }

    // dient om de admin rechten van een gebruiker te toggelen (aan/uit zetten)
    public function toggleAdmin($id)
    {
        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        $user = User::find($id);

        if (! $user) {
            return 'Gebruiker niet gevonden.';
        }

        if ($user->id === auth()->user()->id) {
            return 'Je kunt je eigen admin-rechten niet wijzigen.';
        }

        $user->is_admin = ! $user->is_admin;
        $user->save();

        return redirect('/admin/users');
    }
}
