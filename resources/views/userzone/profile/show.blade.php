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

.profile-card {
    background-color: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
    max-width: 600px;
    margin: 0 auto;
    text-align: center;
}

.profile-card h1 {
    margin-top: 0;
}

.profile-photo {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 20px;
    border: 4px solid #0b1220;
}

.profile-detail {
    font-size: 18px;
    margin: 10px 0;
    color: #374151;
}

.profile-detail strong {
    color: #111827;
}
</style>

<div class="container">

    <div class="profile-card">

        @if($user->profile_photo)
            <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profielfoto" class="profile-photo">
        @endif

        <h1>{{ $user->username ? $user->username : $user->name }}</h1>

        @if($user->bio)
            <p class="profile-detail">{{ $user->bio }}</p>
        @endif

        @if($user->birthday)
            <p class="profile-detail"><strong>Verjaardag:</strong> {{ date('d-m-Y', strtotime($user->birthday)) }}</p>
        @endif

        <p class="profile-detail"><strong>Naam:</strong> {{ $user->name }}</p>

        <p class="profile-detail"><strong>Email:</strong> {{ $user->email }}</p>

    </div>

    {{-- nieuwtjes geschreven door deze gebruiker --}}
    @if(count($user->news) > 0)
        <div style="background-color: white; padding: 30px; border-radius: 15px; margin-top: 30px; text-align: left;">
            <h2>Laatste nieuwtjes</h2>
            @foreach($user->news as $article)
                <p style="border-bottom: 1px solid #eee; padding: 10px 0;">
                    <a href="/news/{{ $article->id }}">{{ $article->title }}</a>
                    <br>
                    <small>{{ date('d-m-Y', strtotime($article->published_at)) }}</small>
                </p>
            @endforeach
        </div>
    @endif

</div>

@endsection
