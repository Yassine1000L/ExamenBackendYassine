<h1>Laatste voetbalnieuws over FC ERASMUS ! </h1>

@foreach($news as $article)


//Wanneer je op titel klikt ga je naar de show pagina van dat nieuws item
<h2>

    <a href="/news/{{ $article->id }}">
        {{ $article->title }}
    </a>

</h2>


    <p>{{ $article->content }}</p>

    <hr>

@endforeach