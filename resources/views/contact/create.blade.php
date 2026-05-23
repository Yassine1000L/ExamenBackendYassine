@extends('layouts.app')

@section('content')

<style>
body {
    background-image: url('https://images.unsplash.com/photo-1574629810360-7efbbe195018');
    background-size: cover;
    background-position: center;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: white;
    padding: 30px;
    border-radius: 15px;
}

input, textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color: #0b1220;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}
</style>

<div class="container">

    <h1>Contact</h1>

    @if(session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form action="/contact" method="POST">

        @csrf

        <input type="text" name="name" placeholder="Naam" value="{{ old('name') }}">

        <br>

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">

        <br>

        <textarea name="message" placeholder="Bericht" rows="5">{{ old('message') }}</textarea>

        <br>

        <button type="submit">Verzenden</button>

    </form>

</div>

@endsection
