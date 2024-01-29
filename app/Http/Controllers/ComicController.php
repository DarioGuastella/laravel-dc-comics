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
        // $request->validate([
        //     "title" => "required|max:50",
        //     // "descrpition" => "",
        //     "thumb" => "required|max:200",
        //     "price" => "required",
        //     "series" => "required|max:50",
        //     "sale_date" => "required",
        //     "type" => "required|max:20"
        // ]);
        $data = $request->all();

        $fumetto = new Comic();

        $fumetto->fill($data);
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
