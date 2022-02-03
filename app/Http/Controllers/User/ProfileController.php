<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\User;

class ProfileController extends Controller
{
    public function getProfileDetails(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
       $user = auth()->user();

        return view('user.profile', ['user' => $user] );
    }

    public function editProfileDetails()
    {

    }

    public function storeNewProfileDetails()
    {

    }

    public function removeProfileDetails()
    {

    }

    public function showCharacterList()
    {
        $characters = Character::with('users')->get();
        return view('user.characters.index', ['characters' => $characters]);
    }

    public function createNewCharacterToList()
    {

        
        return view('user.characters.create');
    }

    public function storeNewCharacterToList()
    {

    }

    public function destroy()
    {

    }
}
