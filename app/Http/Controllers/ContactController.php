<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:10'],
        ]);

        $naam = $request->name;
        $email = $request->email;
        $bericht = $request->message;

        $admin = User::where('is_admin', true)->first();

        if ($admin) {
            $onderwerp = 'Contact formulier van '.$naam;
            $body = 'Naam: '.$naam."\nEmail: ".$email."\nBericht: ".$bericht;
            $headers = 'From: '.$email;

            mail($admin->email, $onderwerp, $body, $headers);
        }

        return redirect('/contact')->with('status', 'Bericht verzonden!');
    }
}
