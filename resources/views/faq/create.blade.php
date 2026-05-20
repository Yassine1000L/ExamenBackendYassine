@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Een FAQ toevoegen..</h1>

    <form action="/faq" method="POST">

        @csrf

        <input type="text" name="question" placeholder="Vraag">

        <br><br>

        <textarea name="answer" placeholder="Antwoord"></textarea>

        <br><br>

        <input type="text" name="category" placeholder="Categorie">

        <br><br>

        <button type="submit">Voeg toe !</button>

    </form>

</div>

@endsection