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

    <h1 style="background-color: rgba(0, 0, 0, 0.6); color: white; padding: 15px; border-radius: 10px; display: inline-block;">Nieuws toevoegen</h1>

    <form action="/news" method="POST" enctype="multipart/form-data">

        @csrf

        <input type="text" name="title" placeholder="Titel">

        <br><br>

        <textarea name="content" placeholder="Inhoud"></textarea>

        <br><br>

        <input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/gif">

        <br><br>

        <button type="submit">Opslaan</button>

    </form>

</div>

@endsection
