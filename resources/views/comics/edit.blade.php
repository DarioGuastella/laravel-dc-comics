@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Modifica fumetto</h2>
        </div>
        <div class="row">
            <form action="{{ route('comics.update', $comic->id) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- title description thumb price series sale_date type --}}
                <div class="mb-3">
                    <label for="title" class="form-label">title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <textarea name="description" class="form-control" id="description" cols="6" rows="5">{{ $comic->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="thumb" class="form-label">thumb</label>
                    <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb }}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $comic->price }}">
                </div>
                <div class="mb-3">
                    <label for="series" class="form-label">series</label>
                    <input type="text" class="form-control" id="series" name="series" value="{{ $comic->series }}">
                </div>
                <div class="mb-3">
                    <label for="sale_date" class="form-label">sale_date</label>
                    <input type="text" class="form-control" id="sale_date" name="sale_date"
                        value="{{ $comic->sale_date }}">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">type</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{ $comic->type }}">
                </div>
                <button type="submit" class="btn btn-primary">Conferma modifiche</button>
            </form>
        </div>
    </div>
@endsection
