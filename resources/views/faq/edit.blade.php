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

    <h1>FAQ aanpassen</h1>

    <form action="/faq/{{ $faq->id }}" method="POST">

        @csrf
        @method('PUT')

        <input 
            type="text" 
            name="question" 
            value="{{ $faq->question }}"
        >

        <br><br>

        <textarea name="answer">{{ $faq->answer }}</textarea>

        <br><br>

        <input 
            type="text" 
            name="category" 
            value="{{ $faq->category }}"
        >

        <br><br>

        <button type="submit">Updaten</button>

    </form>

</div>

@endsection