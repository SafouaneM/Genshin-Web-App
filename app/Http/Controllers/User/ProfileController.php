<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\CharacterUser;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class ProfileController extends Controller
{
    public function getProfileDetails(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = auth()->user();

        return view('user.profile', ['user' => $user]);
    }

    public function editProfileDetails($id)
    {
        $user = User::find($id);

        return view('user.edit', ['user' => $user]);

    }

    public function updateNewProfileDetails(Request $request, $id)
    {
        $user = User::findOrFail($id);


        $input = $request->all();

        $user->fill($input)->save();

        Session::flash('success', 'You have successfully edited your profile');

        return redirect()->back();
    }

    public function removeProfileDetails()
    {

    }

    public function showCharacterList(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $characters = Character::with('users')->get();

        return view('user.characters.index', ['characters' => $characters]);
    }

    public function createNewCharacterToList(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $characters = Character::with('users')->get();
        return view('user.characters.create', ['characters' => $characters]);
    }

    public function storeNewCharacterToList(Request $request): \Illuminate\Http\RedirectResponse
    {


        if (CharacterUser::where('character_id', '=', $request->character_id)->exists()) {
            return redirect()->back()->withErrors(['errors' => 'You already own this character']);
        }

        if ($request->constelation > 6) {
            return redirect()->back()->withErrors(['errors' => 'Check your inputs that kind of value is not allowed']);
        }


        CharacterUser::create( //connect character to user that pressed on submit button
            [
                'is_owned' => 1,
                'character_id' => $request->character_id,
                'user_id' => auth()->user()->id,
                'constelation' => $request->constelation,
                'note' => $request->note,
            ]);


        return redirect()->route('p:character_list')
            ->with('success', 'Character added to your list.');

    }

    public function editCharacterFromList($id)
    {
        $characterUser = CharacterUser::find($id);

        return view('user.characters.edit', ['characterUser' => $characterUser]);

    }

    public function updateCharacterFromList(Request $request, $id)
    {

        if ($request->constelation > 6) {
            return redirect()->back()->withErrors(['errors' => 'Check your inputs that kind of value is not allowed']);
        }

        $characterUser = CharacterUser::findOrFail($id);


        $input = $request->all();

        $characterUser->fill($input)->save();

        Session::flash('success', 'You have successfully edited your character information');

        return redirect()->back();
    }

    public function removeCharacterFromList($id)
    {

       $characterUser = CharacterUser::find($id);
       $characterUser->delete();

        return redirect()->route('p:character_list')->with('success', 'Character removed from list.');
    }
}
