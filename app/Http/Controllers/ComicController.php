<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        $dati = config("data");
        return view("comics.index", compact("comics", "dati"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("comics.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $fumetto = new Comic();
        $fumetto->title = $data["title"];
        $fumetto->description = $data["description"];
        $fumetto->thumb = $data["thumb"];
        $fumetto->price = $data["price"];
        $fumetto->series = $data["series"];
        $fumetto->sale_date = $data["sale_date"];
        $fumetto->type = $data["type"];
        $fumetto->save();

        return redirect()->route("comics.show", $fumetto->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view("comics.show", compact("comic"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view("comics.edit", compact("comic"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();
        $comic->update($data);

        return redirect()->route("comics.show", $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route("comics.index");
    }
}
