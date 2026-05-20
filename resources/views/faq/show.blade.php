@extends('layouts.app')

@section('content')

<div class="container">

    <h1>FAQ Detail</h1>

    <table border="1" cellpadding="10">

        <tr>
            <th>Vraag</th>
            <td>{{ $faq->question }}</td>
        </tr>

        <tr>
            <th>Antwoord</th>
            <td>{{ $faq->answer }}</td>
        </tr>

        <tr>
            <th>Categorie</th>
            <td>{{ $faq->category }}</td>
        </tr>

    </table>

</div>

@endsection