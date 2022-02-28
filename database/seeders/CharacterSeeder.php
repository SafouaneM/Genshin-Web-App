<?php

namespace Database\Seeders;
use App\Models\Character\Character;
use App\Models\User;
use Illuminate\Database\Seeder;

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
