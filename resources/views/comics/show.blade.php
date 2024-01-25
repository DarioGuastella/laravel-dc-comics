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
        </div>
    </div>
@endsection
