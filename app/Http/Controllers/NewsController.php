<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // om de nieuws pagina te kunnen tonen.
    public function index()
    {
        $news = News::all();

        return view('news.index', compact('news'));
    }

    public function create()
    {

        // om de admin nieuws items te laten toevoegen

        if (! auth()->check() || ! auth()->user()->is_admin) {

            return 'Je hebt geen toestemming voor deze operatie.';
        } else {
            return view('news.create');
        }
    }

    // is gedaan om nieuws toe te voegen aan de DB en daarna terug te sturen naar de news pagina
    public function store(Request $request)
    {

        if (! auth()->check() || ! auth()->user()->is_admin) {

            return 'Je hebt geen toestemming voor deze operatie.';
        }

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'published_at' => now(),
            'user_id' => auth()->id(),
        ]);

        return redirect('/news');
    }

    public function show(News $news)
    {

        return view('news.show', compact('news'));

    }

    public function destroy(News $news)
    {

        if (! auth()->check() || ! auth()->user()->is_admin) {

            return 'Je hebt geen toestemming voor deze operatie.';
        }

        $news->delete();

        return redirect('/news');
    }

    public function edit(News $news)
    {

        if (! auth()->check() || ! auth()->user()->is_admin) {

            return 'Je hebt geen toestemming voor deze operatie.';

        }

        return view('news.edit', compact('news'));

    }

    public function update(Request $request, News $news)
    {

        if (! auth()->check() || ! auth()->user()->is_admin) {

            return 'Je hebt geen toestemming voor deze operatie.';

        }

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/news');

    }
}
