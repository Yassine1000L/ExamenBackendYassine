<h1>Nieuws toevoegen </h1>


<!-- action news stuur dat naar de store() functie -->
<form action="/news" method="POST">

    @csrf

    <input type="text" name="title" placeholder="Titel">

    <br><br>

    <textarea name="content" placeholder="Inhoud"></textarea>

    <br><br>

    <button type="submit">
        Opslaan...
    </button>

</form>