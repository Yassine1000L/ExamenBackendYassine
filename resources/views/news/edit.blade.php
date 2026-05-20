

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

    <h1>Nieuws aanpassen</h1>

<form action="/news/{{ $news->id }}" method="POST">

    @csrf
    @method('PUT')

    <input 
        type="text" 
        name="title" 
        value="{{ $news->title }}"
    >

    <br><br>

    <textarea name="content">{{ $news->content }}</textarea>

    <br><br>

    <button type="submit">
        Opslaan
    </button>

</form>

</div>

@endsection

