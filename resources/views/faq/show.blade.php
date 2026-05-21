@extends('layouts.app')

@section('content')

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

    <h1 style="background-color: rgba(0, 0, 0, 0.6); color: white; padding: 15px; border-radius: 10px; display: inline-block;">FAQ Detail</h1>

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