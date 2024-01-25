@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Fumetti</h2>
        </div>
        <div class="row">
            @foreach ($comics as $comic)
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comic->title }}</h5>
                            <p class="card-text">{{ $comic->description }}</p>
                            <p class="card-text">
                                Prezzo: {{ $comic->price }}<br>
                                Serie: {{ $comic->series }}<br>
                                Data di vendita: {{ $comic->sale_date }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
