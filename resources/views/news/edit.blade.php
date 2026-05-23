@extends('layouts.app')

@section('content')

<style>

body {
    background-image: url('https://images.unsplash.com/photo-1574629810360-7efbbe195018');
    background-size: cover;
    background-position: center;
}

</style>

<div class="container">

    <h1 style="background-color: rgba(0, 0, 0, 0.6); color: white; padding: 15px; border-radius: 10px; display: inline-block;">Nieuws aanpassen</h1>

    <form action="/news/{{ $news->id }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('patch')

        <input type="text" name="title" value="{{ $news->title }}">

        <br><br>

        <textarea name="content">{{ $news->content }}</textarea>

        <br><br>

        <input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/gif">

        @if ($news->image)
            <br>
            <p>Huidige afbeelding: <a href="{{ asset('storage/' . $news->image) }}" target="_blank">Bekijken</a></p>
        @endif

        <br><br>

        <button type="submit">Opslaan</button>

    </form>

</div>

@endsection
