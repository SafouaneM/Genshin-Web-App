<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Illuminate\Support\Facades\Http;

class CharacterController extends Controller
{

    public function index()
    {
       $characters = Character::orderBy('id','asc')->paginate(15);

        return view('characters.index', ['characters' => $characters]);
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

}
