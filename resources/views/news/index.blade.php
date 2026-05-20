<h1>Laatste voetbalnieuws over FC ERASMUS ! </h1>

@foreach($news as $article)

<h2>

    <a href="/news/{{ $article->id }}">
        {{ $article->title }}
    </a>

</h2>

    <p>{{ $article->content }}</p>

    <hr>

@endforeach