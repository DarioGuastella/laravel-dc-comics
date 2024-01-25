<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array_fumetti = config("comics");

        foreach ($array_fumetti as $fumetto) {
            $nuovo_fumetto = new Comic();
            $nuovo_fumetto->title = $fumetto["title"];
            $nuovo_fumetto->description = $fumetto["description"];
            $nuovo_fumetto->thumb = $fumetto["thumb"];
            $nuovo_fumetto->price = $fumetto["price"];
            $nuovo_fumetto->series = $fumetto["series"];
            $nuovo_fumetto->sale_date = $fumetto["sale_date"];
            $nuovo_fumetto->type = $fumetto["type"];
            $nuovo_fumetto->save();
        }
    }
}
