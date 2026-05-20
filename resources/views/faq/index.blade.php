
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

    <h1>FAQ Pagina</h1>

    <a href="/faq/create">
        <button>FAQ toevoegen</button>
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

