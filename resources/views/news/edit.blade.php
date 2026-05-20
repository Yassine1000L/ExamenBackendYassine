<h1>Nieuws aanpassen</h1>

<form action="/news/{{ $news->id }}" method="POST">

    @csrf
    @method('PUT')

    <input 
        type="text" 
        name="title" 
        value="{{ $news->title }}"
    >

    <br><br>

    <textarea name="content">{{ $news->content }}</textarea>

    <br><br>

    <button type="submit">
        Opslaan
    </button>

</form>