<h1>{{ $news->title }}</h1>

<p>{{ $news->content }}</p>

<a href="/news">
    Terug naar nieuws gaan.
</a>

<a href="/news/{{ $news->id }}/edit">
    Nieuws aanpassen
</a>



// Om een nieuws item te kunnen verwijderen
<form action="/news/{{ $news->id }}" method="POST">

    @csrf
    @method('DELETE')

    <button type="submit">
        Verwijder nieuws
    </button>

</form>