@extends('layouts.app')

@section('content')

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