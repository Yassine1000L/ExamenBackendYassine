
@extends('layouts.app')

@section('content')

<div class="container">

<style>

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
}

th {
    background-color: #0b1220;
    color: white;
    padding: 15px;
}

td {
    padding: 15px;
    border-bottom: 1px solid #ccc;
}

button {
    background-color: red;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 8px;
}

form {
    display: inline;
}

</style>

<div class="container">

    <h1>FAQ Pagina</h1>

    <a href="/faq/create">
        <button>Een FAQ toevoegen</button>
    </a>

    <br><br>

    <table>

        <tr>
            <th>Vraag</th>
            <th>Antwoord</th>
            <th>Categorie</th>
            <th>Acties</th>
        </tr>

        @foreach($faqs as $faq)

        <tr>

            <td>{{ $faq->question }}</td>

            <td>{{ $faq->answer }}</td>

            <td>{{ $faq->category }}</td>

            <td>

                <a href="/faq/{{ $faq->id }}">
                    <button>Bekijk</button>
                </a>

                <a href="/faq/{{ $faq->id }}/edit">
                    <button>Edit</button>
                </a>

                <form action="/faq/{{ $faq->id }}" method="POST">

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

