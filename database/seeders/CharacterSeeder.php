<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Character;

class CharacterSeeder extends Seeder
{
    public function run()
    {
        factory(Character::class, 2)->create();

        foreach (Character::all() as $character) {
            $users = User::inRandomOrder()->take(rand(1,3))->pluck('id');
            $character->users()->attach($users);
        }
    }
}
