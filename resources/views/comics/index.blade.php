@extends('layouts.app')

@section('content')
    <header class="d-flex container justify-content-between">
        <!-- Logo -->
        <img class="p-4 header-logo" src="../assets/img/dc-logo.png" alt="">
        <!-- navigatore -->
        <nav class="d-flex align-items-center myNav">

            @foreach ($dati['navPages'] as $navPage)
                <a class="{{ $navPage['page'] == 'COMICS' ? 'mx-3 active' : 'mx-3' }}"
                    href="#">{{ $navPage['page'] }}</a>
            @endforeach

        </nav>
    </header>
    <!-- Jumbotron -->
    <div id="jumbotron">
        <img id="jumbo" src="../assets/img/jumbotron.jpg" alt="">
    </div>

    <!-- Comics cards -->
    <section class="my-bg-dark">
        <div class="container">
            <div class="currentSeries myBtn">
                <h3>CURRENT SERIES</h3>
            </div>
            <div id="cardsWrapper">
                @foreach ($comics as $comic)
                    <div class="myCard">
                        <a href="{{ route('comics.show', $comic->id) }}"><img src="{{ $comic->thumb }}" class="comics-img"
                                alt="{{ $comic->title }}"></a>
                        <h3 class="comics-title">{{ strtoupper($comic->title) }}</h3>
                        {{-- <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning">Modifica</a> --}}
                        <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Cancella" class="btn btn-danger">
                            <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning">Modifica</a>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">

                <a class="myBtn loadBtn" href="{{ route('comics.create') }}">
                    <h3 class="loadText">AGGIUNGI FUMETTO</h3>
                </a>


            </div>

        </div>
    </section>
    <!-- CLIENTS -->
    <section id="buyRow">
        <div class="container d-flex justify-content-center p-5">
            <div class="d-flex align-items-center">

                @foreach ($dati['clients'] as $client)
                    <div class="text-center ps-5 pe-2">
                        <img class="buy-img" src="{{ $client['image'] }}" alt="">
                        <div class="mt-2">
                            <h3 class="buy-text">{{ strtoupper($client['title']) }}</h3>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <section class="container-fluid upper-footer">
        {{-- ToDo: snellire codice --}}
        <div class="d-flex justify-content-around overflow-y-hidden">
            <div class="d-flex p-5">
                <ul class="footer-item">
                    <h5 class="text-white">{{ $dati['DCCOMICS'][0]['class'] }}</h5>
                    @foreach ($dati['DCCOMICS'] as $DCcomic)
                        <li class="text-secondary"><a class="footer-link" href="#">{{ $DCcomic['title'] }}</a></li>
                    @endforeach
                    <ul class="footer-item ps-0">
                        <h5 class="text-white mt-2">{{ $dati['SHOPS'][0]['class'] }}</h5>
                        @foreach ($dati['SHOPS'] as $Shop)
                            <li class="text-secondary"><a class="footer-link" href="#">{{ $Shop['title'] }}</a></li>
                        @endforeach
                    </ul>
                </ul>
                <ul class="footer-item">
                    <h5 class="text-white">{{ $dati['DC'][0]['class'] }}</h5>
                    @foreach ($dati['DC'] as $DClink)
                        <li class="text-secondary"><a class="footer-link" href="#">{{ $DClink['title'] }}</a></li>
                    @endforeach
                </ul>
                <ul class="footer-item">
                    <h5 class="text-white">{{ $dati['SITES'][0]['class'] }}</h5>
                    @foreach ($dati['SITES'] as $site)
                        <li class="text-secondary"><a class="footer-link" href="#">{{ $site['title'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="footer-wrapper-img">
                <img class="footer-bg" src="/assets/img/dc-logo-bg.png" alt="">
            </div>
        </div>



    </section>
    <section class="lower-footer">
        <div class="container d-flex justify-content-between h-100 align-items-center">
            <div>
                <button class="btn btn-outline-light my-footer-btn">SIGN-UP NOW!</button>
            </div>
            <div class="d-flex align-items-center">
                <h5 class="mb-0 pe-3 lower-text">FOLLOW US</h5>
                <img class="lower-footer-img" src="../assets/img/footer-facebook.png" alt="">
                <img class="lower-footer-img" src="../assets/img/footer-periscope.png" alt="">
                <img class="lower-footer-img" src="../assets/img/footer-pinterest.png" alt="">
                <img class="lower-footer-img" src="../assets/img/footer-twitter.png" alt="">
                <img class="lower-footer-img" src="../assets/img/footer-youtube.png" alt="">
            </div>
        </div>

    </section>
@endsection
