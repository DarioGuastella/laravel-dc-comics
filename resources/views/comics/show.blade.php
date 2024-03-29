@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>{{ $comic->title }}</h2>
        </div>
        <div class="row">
            <img class="w-25" src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
        </div>
        <div class="row">
            <p>{{ $comic->description }}</p>
            <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning">Modifica</a>
            <a href="{{ route('comics.index') }}" class="btn btn-primary mt-3">Torna alla sezione fumetti</a>

        </div>
    </div>
@endsection
