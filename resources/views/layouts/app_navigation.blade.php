<nav>

    <div class="nav-left">

        <a href="/">Home</a>

        <a href="/news">Nieuws</a>

        <a href="/faq">FAQ</a>

        <a href="/contact">Contact</a>

    </div>


    <div class="nav-right">

        @guest 

            <a href="/login">Login</a>

            <a href="/register">Register</a>

        @endguest


        @auth

            @if(auth()->user()->is_admin)
                <a href="/admin/users">Gebruikers</a>
                <a href="/admin/contacts">Berichten</a>
            @endif

            <a href="/profile">Profiel</a>

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
