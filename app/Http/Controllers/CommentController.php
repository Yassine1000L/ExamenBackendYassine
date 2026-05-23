<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $news_id)
    {
        if (! auth()->check()) {
            return 'Je moet ingelogd zijn om te reageren.';
        }

        $news = News::find($news_id);

        if (! $news) {
            return 'Nieuwsartikel niet gevonden ';
        }

        $request->validate([
            'content' => ['required', 'string', 'min:2'],
        ]);

        $comment = new Comment;
        $comment->content = $request->content;
        $comment->user_id = auth()->user()->id;
        $comment->news_id = $news->id;
        $comment->save();

        return redirect('/news/'.$news->id);
    }

    public function destroy($id)
    {
        if (! auth()->check() || ! auth()->user()->is_admin) {
            return 'Je hebt geen toestemming voor deze operatie.';
        }

        $comment = Comment::find($id);

        if (! $comment) {
            return 'Reactie niet gevonden.';
        }

        $comment->delete();

        return redirect('/news/'.$comment->news_id);
    }
}
