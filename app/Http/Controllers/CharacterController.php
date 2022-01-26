<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Illuminate\Support\Facades\Http;

class CharacterController extends Controller
{

    public function index()
    {
       $characters = Character::orderBy('id','asc')->paginate(10);

       $element_color = [
           "Electro" => 'violet-500',
           "Pyro" => 'red-500',
           "Geo" => 'amber-900',
           "Cryo" => 'sky-200',
           "Anemo" => 'emerald-400',
           "Hydro" => 'blue-600',
       ];

        return view('characters.index', ['characters' => $characters], ['element_color' => $element_color]);
    }

    public function fetchCharacters(): string
    {
        $response = Http::get('https://api.genshin.dev/characters/all');

        $characters = json_decode($response->body());

//        $iconUrl = Http::get('https://api.genshin.dev/characters/$character_name/icon');


        foreach ($characters as $c) {
            //TODO This is so ugly man. pls dont forget to change
            $character = new Character;

            $character->name = $c->name;
            $character->vision = $c->vision;
            $character->weapon = $c->weapon;
            $character->nation = $c->nation;
            $character->affiliation = $c->affiliation;
            $character->rarity = $c->rarity;
            $character->constellation = $c->constellation;

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
        $character = Character::find($id);

        return view('characters.show', ['character' => $character]);
    }

}
