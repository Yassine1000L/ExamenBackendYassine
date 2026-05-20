
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

    
<h1>toevoegen </h1>


<!-- action news stuur dat naar de store() functie -->
<form action="/news" method="POST">

    @csrf

    <input type="text" name="title" placeholder="Titel">

    <br><br>

    <textarea name="content" placeholder="Inhoud"></textarea>

    <br><br>

    <button type="submit">
        Opslaan...
    </button>

</form>

</div>

@endsection
