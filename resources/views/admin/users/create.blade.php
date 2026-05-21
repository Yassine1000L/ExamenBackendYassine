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

.form-card {
    background-color: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
    max-width: 500px;
    margin: 0 auto;
}

.form-card h1 {
    margin-top: 0;
}

.form-card label {
    display: block;
    font-weight: bold;
    margin-top: 15px;
    margin-bottom: 5px;
}

.form-card input[type="text"],
.form-card input[type="email"],
.form-card input[type="password"] {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #d1d5db;
    font-size: 16px;
    box-sizing: border-box;
}

.form-card .checkbox-label {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 20px;
    font-weight: bold;
}

.form-card .checkbox-label input {
    width: 20px;
    height: 20px;
}

.form-card button {
    background-color: red;
    color: white;
    border: none;
    padding: 14px 20px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    width: 100%;
    margin-top: 25px;
    transition: 0.3s;
}

.form-card button:hover {
    background-color: #cc0000;
}
</style>

<div class="container">

    <div class="form-card">

        <h1>Nieuwe gebruiker aanmaken</h1>

        <form action="/admin/users/create" method="POST">

            @csrf

            <label for="name">Naam</label>
            <input type="text" name="name" id="name" placeholder="Naam" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" required>

            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password" placeholder="Wachtwoord" required>


            <!-- vinkje voor admin rechten -->
            <label class="checkbox-label">
                <input type="checkbox" name="is_admin">
                Admin-rechten geven
            </label>

            <button type="submit">Gebruiker aanmaken</button>

        </form>

    </div>

</div>

@endsection
