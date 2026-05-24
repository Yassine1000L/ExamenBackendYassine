<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();

        // groepeer FAQs per category, bijv. 'Training' enz.
        $grouped = [];
        foreach ($faqs as $faq) {
            $grouped[$faq->category][] = $faq;
        }

        return view('faq.index', compact('grouped'));
    }

    public function create()
    {
        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        return view('faq.create');
    }

    public function store(Request $request)
    {
        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->category = $request->category;
        $faq->user_id = auth()->user()->id;
        $faq->save();

        return redirect('/faq');
    }

    public function show($id)
    {
        $faq = Faq::find($id);

        if (! $faq) {
            return 'FAQ niet gevonden.';
        }

        return view('faq.show', compact('faq'));
    }

    public function edit($id)
    {
        $faq = Faq::find($id);

        if (! $faq) {
            return 'FAQ niet gevonden.';
        }

        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        return view('faq.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::find($id);

        if (! $faq) {
            return 'FAQ niet gevonden.';
        }

        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->category = $request->category;
        $faq->save();

        return redirect('/faq');
    }

    public function destroy($id)
    {
        $faq = Faq::find($id);

        if (! $faq) {
            return 'FAQ niet gevonden.';
        }

        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        $faq->delete();

        return redirect('/faq');
    }
}
