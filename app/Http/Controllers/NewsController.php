<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return view('news.index', compact('news'));
    }

    public function create()
    {
        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        return view('news.create');
    }

    public function store(Request $request)
    {
        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        $news = new News;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->published_at = date('Y-m-d H:i:s');
        $news->user_id = auth()->user()->id;

        if ($request->hasFile('image')) {
            $news->image = $request->file('image')->store('news-images', 'public');
        }

        $news->save();

        return redirect('/news');
    }

    public function show($id)
    {
        $news = News::find($id);

        if (! $news) {
            return 'Nieuwsartikel niet gevonden.';
        }

        return view('news.show', compact('news'));
    }

    public function edit($id)
    {
        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        $news = News::find($id);

        if (! $news) {
            return 'Nieuwsartikel niet gevonden.';
        }

        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        $news = News::find($id);

        if (! $news) {
            return 'Nieuwsartikel niet gevonden.';
        }

        $news->title = $request->title;
        $news->content = $request->content;

        if ($request->hasFile('image')) {
            $news->image = $request->file('image')->store('news-images', 'public');
        }

        $news->save();

        return redirect('/news');
    }

    public function destroy($id)
    {
        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        $news = News::find($id);

        if (! $news) {
            return 'Nieuwsartikel niet gevonden.';
        }

        $news->delete();

        return redirect('/news');
    }
}
