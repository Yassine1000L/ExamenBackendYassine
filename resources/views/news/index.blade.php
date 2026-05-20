@extends('layouts.app')

@section('content')

<style>
body {
    background-image: url('https://images.unsplash.com/photo-1574629810360-7efbbe195018');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    min-height: 100vh;
}
</style>

<div class="container">

<h1 style="background-color: rgba(0, 0, 0, 0.6); color: white; padding: 15px; border-radius: 10px; display: inline-block;">Laatste voetbal NIEUWS over FC Erasmus !</h1>

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