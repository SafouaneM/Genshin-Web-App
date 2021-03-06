<?php

namespace App\Http\Controllers\Character;

use function view;
use App\Models\Character;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class CharacterController extends Controller
{

    public function index()
    {
        $characters = Character::orderBy('id', 'asc')->paginate(10);

        $element_color = [
            "Electro" => '#8b5cf6',
            "Pyro" => '#ef4444',
            "Geo" => '#78350f',
            "Cryo" => '#bae6fd',
            "Anemo" => '#059669',
            "Hydro" => '#2563eb',
        ];


        return view('characters.index', compact('element_color', 'characters')

        );

    }

    public function fetchCharacters(): string
    {
        //todo actually wanna store characters on aws later =) and needs to be with a job and cmd
        $response = Http::get('https://api.genshin.dev/characters/all');

        $characters = json_decode($response->body());

//        $iconUrl = Http::get('https://api.genshin.dev/characters/$character_name/icon');

        foreach ($characters as $c) {

            $icon = [];
            $characterIconName = strtolower(preg_replace('/\s+/', '-', $c->name));
            $c->icon = "https://api.genshin.dev/characters/$characterIconName/icon";

            //TODO This is so ugly man. pls dont forget to change
            $character = new Character;
            //todo regex for replacing the first names of characters for the icons.
            $character->name = $c->name;
            $character->vision = $c->vision;
            $character->weapon = $c->weapon;
            $character->nation = $c->nation;
            $character->affiliation = $c->affiliation;
            $character->rarity = $c->rarity;
            $character->constellation = $c->constellation;
            $character->icon = $c->icon;

            if (isset($c->birthday)) {
                $character->birthday = $c->birthday;
            }

            $character->description = $c->description;
            $character->skillTalents = $c->skillTalents;
            $character->passiveTalents = $c->passiveTalents;
            $character->constellations = $c->constellations;

            if (isset($c->outfits)) {
                $character->outfits = $c->outfits;
            }

            $character->save();
        }
        return "Finished";
    }

    public function showInvidualCharacter($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $characters = Character::find($id);


        return view('characters.show', ['character' => $characters]);
    }


}
