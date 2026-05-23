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

button {
    background-color: red;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 8px;
    cursor: pointer;
    width: 90px;
}
</style>

<div class="container">

    <h1 style="background-color: rgba(0, 0, 0, 0.6); color: white; padding: 15px; border-radius: 10px; display: inline-block;">Contactberichten</h1>

    <table>
        <tr>
            <th>Naam</th>
            <th>Email</th>
            <th>Bericht</th>
            <th>Datum</th>
            <th>Acties</th>
        </tr>

        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->message }}</td>
            <td>{{ date('d-m-Y H:i', strtotime($contact->created_at)) }}</td>
            <td>
                <form action="/admin/contacts/{{ $contact->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Verwijder</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>

@endsection
