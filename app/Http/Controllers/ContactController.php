<?php

namespace App\Http\Controllers;

use App\Models\Contact;
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

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        $admin = User::where('is_admin', true)->first();

        if ($admin) {
            $log = "Onderwerp: Contact formulier van " . $request->name . "\n";
            $log .= "Naam: " . $request->name . "\n";
            $log .= "Email: " . $request->email . "\n";
            $log .= "Bericht: " . $request->message . "\n";
            $log .= "Datum: " . date('Y-m-d H:i:s') . "\n";
            $log .= "---\n";

            file_put_contents(storage_path('logs/contact-emails.log'), $log, FILE_APPEND);
        }

        return redirect('/contact')->with('status', 'Bericht verzonden!');
    }

    public function index()
    {
        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        $contacts = Contact::all();

        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy($id)
    {
        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        $contact = Contact::find($id);

        if (! $contact) {
            return 'Bericht niet gevonden.';
        }

        $contact->delete();

        return redirect('/admin/contacts');
    }
}
