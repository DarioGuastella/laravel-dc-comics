<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{

    public function validation($data)
    {
        $validated = Validator::make(
            $data,
            [
                "title" => "required|min:5|max:50",
                "description" => "",
                "thumb" => "max:200",
                "price" => "required",
                "series" => "required|max:20",
                "sale_date" => "required|max:20",
                "type" => "required|max:20"
            ],
            [
                'title.required' => 'Il titolo è necessario',
                'price.required' => 'Il prezzo è necessario',
                'series.required' => 'Il nome della serie è necessario',
                'sale_date.required' => 'La data di vendita è necessaria',
                'type.required' => 'Il tipo di fumetto è necessario',
            ]
        )->validate();

        return $validated;
    }
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
        $dati = config("data");
        return view("comics.create", compact("dati"));
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
        $dati_validati = $this->validation($data);

        $fumetto = new Comic();

        $fumetto->fill($dati_validati);
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
        $dati_validati = $this->validation($data);
        $comic->update($dati_validati);

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
