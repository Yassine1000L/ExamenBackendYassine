<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;


class NewsController extends Controller
{
    

// om de nieuws pagina te kunnen tonen. 
public function index()
{
    $news = News::all();

    return view('news.index', compact('news'));
}



// om de admin nieuwe nieuws items te laten toevoegen,
// deze functie stuurt de admin naar een pagina waar hij/zij nieuws kan toevoegen
    
public function create() {

        return view('news.create');

    }



// is gedaan om nieuws toe te voegen aan de DB en daarna terug te sturen naar de news pagina
public function store(Request $request) {
        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'published_at' => now(),
        ]);

        //Dus Laravel stuurt je naar ' /news ' nadat je een nieuwe form item hebt toegevoegd
        return redirect('/news');

    }


public function show(News $news) {

    return view('news.show', compact('news'));

}
}