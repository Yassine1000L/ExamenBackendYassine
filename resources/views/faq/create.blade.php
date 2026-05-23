@extends('layouts.app')

@section('content')

<div class="container">

    <h1 style="background-color: rgba(0, 0, 0, 0.6); color: white; padding: 15px; border-radius: 10px; display: inline-block;">Een FAQ toevoegen..</h1>

    <form action="/faq" method="POST">

        @csrf

        <input type="text" name="question" placeholder="Vraag" required maxlength="255">

        <br><br>

        <textarea name="answer" placeholder="Antwoord" required></textarea>

        <br><br>

        <input type="text" name="category" placeholder="Categorie" required maxlength="255">

        <br><br>

        <button type="submit">Voeg toe !</button>

    </form>

</div>

@endsection