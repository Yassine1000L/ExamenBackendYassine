<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $data = [
            'naam' => $request->name,
            'email' => $request->email,
            'bericht' => $request->message,
        ];

        $admin = User::where('is_admin', true)->first();

        if ($admin) {
            Mail::send('emails.contact', compact('data'), function ($mail) use ($admin, $data) {
                $mail->to($admin->email)
                     ->subject('Contact formulier van ' . $data['naam']);
            });
        }

        return redirect('/contact')->with('status', 'Bericht verzonden!');
    }
}
