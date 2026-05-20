@extends('layouts.app')

@section('content')

<div class="container">

<h1>Laatste voetbal NIEUWS over FC Erasmus !</h1>

@auth
@if(auth()->user()->is_admin)

<a class="btn" href="/news/create">
    Nieuwe NEWS toevoegen
</a>

<br><br>

@endif


@endauth


@foreach($news as $article)

<div class="news-card">

    <h2>
        <a href="/news/{{ $article->id }}">
            {{ $article->title }}
        </a>
    </h2>

    <p>{{ $article->content }}</p>

</div>

@endforeach

</div>

@endsection