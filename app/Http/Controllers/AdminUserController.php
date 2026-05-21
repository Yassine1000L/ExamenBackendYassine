<?php

namespace App\Http\Controllers;

use App\Models\User;

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

    public function toggleAdmin(User $user)
    {
        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        if ($user->id === auth()->id()) {
            return 'Je kunt je eigen admin-rechten niet wijzigen.';
        }

        $user->update([
            'is_admin' => ! $user->is_admin,
        ]);

        return redirect('/admin/users');
    }
}
