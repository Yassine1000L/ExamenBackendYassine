<h1>Laatste voetbalnieuws </h1>

@foreach($news as $article)

    <h2>{{ $article->title }}</h2>

    <p>{{ $article->content }}</p>

    <hr>

@endforeach