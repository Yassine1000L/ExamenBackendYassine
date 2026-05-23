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

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
    background-color: rgb(255, 255, 255);
    font-size: 18px;
    font-weight: bold;
}

th {
    background-color: #0b1220;
    color: white;
    padding: 15px;
    text-align: center;
}

td {
    padding: 15px;
    border-bottom: 1px solid #ccc;
    text-align: center;
    vertical-align: middle;
}

td form,
td a {
    display: flex;
    justify-content: center;
    margin-bottom: 5px;
}

button {
    background-color: red;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 8px;
    cursor: pointer;
    width: 90px;
    margin-bottom: 5px;
}

form {
    display: block;
}

</style>

<div class="container">

    <h1 style="background-color: rgba(0, 0, 0, 0.6); color: white; padding: 15px; border-radius: 10px; display: inline-block;">Nieuws Detail</h1>

    <table border="1" cellpadding="10">
        <tr>
            <th>Titel</th>
            <td>{{ $news->title }}</td>
        </tr>

        <tr>
            <th>Afbeelding</th>
            <td>
                @if ($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" style="max-width: 100%; height: auto;">
                @else
                    Geen afbeelding
                @endif
            </td>
        </tr>

        <tr>
            <th>Inhoud</th>
            <td>{{ $news->content }}</td>
        </tr>

        <tr>
            <th>Publicatiedatum</th>
            <td>{{ $news->published_at }}</td>
        </tr>
    </table>

    <br>

    <a href="/news">
        <button>Terug naar nieuws</button>
    </a>

    <a href="/news/{{ $news->id }}/edit">
        <button>Nieuws aanpassen</button>
    </a>

    <form action="/news/{{ $news->id }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit">Verwijder nieuws</button>
    </form>

</div>

@endsection
