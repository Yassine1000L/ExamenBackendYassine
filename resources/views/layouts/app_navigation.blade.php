<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>FC Erasmus !</title>
</head>

<body>

   <nav>

    <div class="nav-left">

        <a href="/">Home</a>

        <a href="/news">Nieuws</a>

        <a href="/faqs">FAQ</a>

        <a href="/contact">Contact</a>

    </div>


    <div class="nav-right">

        @guest 

            <a href="/login">Login</a>

            <a href="/register">Register</a>

        @endguest


        @auth

            <p>Welkom, {{ auth()->user()->name }}</p>

            <form action="/logout" method="POST">

                @csrf

                <button class="logout-btn" type="submit">
                    Logout
                </button>

            </form> 

        @endauth

    </div>

</nav>

    @yield('content') <!-- Hier komt de content van de pagina -->

</body>

</html>

