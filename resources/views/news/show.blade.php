

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

    <h1>{{ $news->title }}</h1>

<p>{{ $news->content }}</p>

<a href="/news">
    Terug naar nieuws gaan.
</a>

<a href="/news/{{ $news->id }}/edit">
    Nieuws aanpassen
</a>



<form action="/news/{{ $news->id }}" method="POST">

    @csrf
    @method('DELETE')


    
        
    
    <button type="submit">
        Verwijder nieuws
    </button>



</form>

</div>

@endsection




