<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;


class FaqController extends Controller
{
    
    // om de faq pagina te tonen
    public function index()
    {
        $faqs = Faq::all();

        return view('faq.index', compact('faqs'));
    }







    // om de admin faq items te laten toevoegen
    public function create()
    {

        if (!auth()->check() || !auth()->user()->is_admin) {

            return 'Je hebt geen toestemming voor deze operatie.';
        }

        else {

            return view('faq.create');


        }
    }








    // om faq toe te voegen aan de DB en daarna terug te sturen naar de faq pagina
    public function store(Request $request)
    {

        if (!auth()->check() || !auth()->user()->is_admin) {

            return 'Je hebt geen toestemming voor deze operatie.';
        }

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'category' => $request->category,
        ]);

        return redirect('/faq');
    }








    public function show(Faq $faq)
    {

        return view('faq.show', compact('faq'));
    }








    public function destroy(Faq $faq)
    {

        if (!auth()->check() || !auth()->user()->is_admin) {

            return 'Je hebt geen toestemming voor deze operatie.';
        }

        $faq->delete();

        return redirect('/faq');
    }








    public function edit(Faq $faq)
    {

        if (!auth()->check() || !auth()->user()->is_admin) {

            return 'Je hebt geen toestemming voor deze operatie.';
        }

        return view('faq.edit', compact('faq'));
    }








    public function update(Request $request, Faq $faq)
    {

        if (!auth()->check() || !auth()->user()->is_admin) {

            return 'Je hebt geen toestemming voor deze operatie.';
        }

        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'category' => $request->category,
        ]);

        return redirect('/faq');
    }

}