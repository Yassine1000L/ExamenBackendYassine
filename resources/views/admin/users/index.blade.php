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
    width: 120px;
}
</style>

<div class="container">

    <h1 style="background-color: rgba(0, 0, 0, 0.6); color: white; padding: 15px; border-radius: 10px; display: inline-block;">Admin - Gebruikers beheren</h1>

    <br><br>

    <a href="/admin/users/create">
        <button>Nieuwe gebruiker</button>
    </a>

    <br><br>

    <table>
        <tr>
            <th>Naam</th>
            <th>Email</th>
            <th>Admin</th>
            <th>Actie</th>
        </tr>

        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->is_admin ? 'Ja' : 'Nee' }}</td>
            <td>
                @if($user->id !== auth()->id())
                <form action="/admin/users/{{ $user->id }}/toggle-admin" method="POST">
                    @csrf
                    <button type="submit">
                        {{ $user->is_admin ? 'Admin ontnemen' : 'Admin maken' }}
                    </button>
                </form>
                @else
                    <em>Jijzelf</em>
                @endif
            </td>
        </tr>
        @endforeach
    </table>

</div>

@endsection
