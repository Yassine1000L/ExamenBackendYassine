@extends('layouts.app')

@section('content')

<style>

body {
        background-image: url('https://images.unsplash.com/photo-1574629810360-7efbbe195018');
        background-size: cover;
        background-position: center;
}
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

    <h1 style="background-color: rgba(0, 0, 0, 0.6); color: white; padding: 15px; border-radius: 10px; display: inline-block;">FAQ aanpassen</h1>

    <form action="/faq/{{ $faq->id }}" method="POST">

        @csrf
        {{-- zet POST om naar PATCH --}}
        @method('patch')

        <input 
            type="text" 
            name="question" 
            value="{{ $faq->question }}"
            required
            maxlength="255"
        >

        <br><br>

        <textarea name="answer" required>{{ $faq->answer }}</textarea>

        <br><br>

        <input 
            type="text" 
            name="category" 
            value="{{ $faq->category }}"
            required
            maxlength="255"
        >

        <br><br>

        <button type="submit">Updaten</button>

    </form>

</div>

@endsection