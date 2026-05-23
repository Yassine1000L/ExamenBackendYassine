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

    <h1 style="background-color: rgba(0, 0, 0, 0.6); color: white; padding: 15px; border-radius: 10px; display: inline-block;">Laatste voetbal NIEUWS over FC Erasmus !</h1>

    @auth
    @if(auth()->user()->is_admin)

    <a href="/news/create">
        <button>Nieuws toevoegen</button>
    </a>

    <br><br>

    @endif
    @endauth

    <table>
        <tr>
            <th>Titel</th>
            <th>Inhoud</th>
            <th>Afbeelding</th>
            <th>Auteur</th>
            <th>Acties</th>
        </tr>

        @foreach($news as $article)

        <tr>
            <td>{{ $article->title }}</td>
            <td>{{ $article->content }}</td>
            <td>
                @if ($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="width: 100px; height: auto;">
                @else
                    Geen
                @endif
            </td>
            <td>
                <a href="/users/{{ $article->user_id }}">Bekijk profiel</a>
            </td>
            <td>
                <a href="/news/{{ $article->id }}">
                    <button>Bekijk</button>
                </a>

                <a href="/news/{{ $article->id }}/edit">
                    <button>Edit</button>
                </a>

                <form action="/news/{{ $article->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>

        @endforeach
    </table>

</div>

@endsection
