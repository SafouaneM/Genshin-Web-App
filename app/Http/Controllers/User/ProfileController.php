<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\CharacterUser;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class ProfileController extends Controller
{
    protected function getProfileDetails(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = auth()->user();


        return view('user.profile', ['user' => $user]);
    }

    protected function editProfileDetails($id)
    {
        $user = User::find($id);

        return view('user.edit', ['user' => $user]);

    }

    protected function updateNewProfileDetails(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        if ($request->hasFile('profile_picture')) {

            $input = $request->except('profile_picture');

            $request->validate([
                'profile_picture' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $request->file('profile_picture')->store('profile_pictures', 'public');

            $user->profile_picture = $request->file('profile_picture')->hashName();
            $this->deleteOldImage();
            $user->fill($input)->save();

        } else {
            $input = $request->all();

            $user->fill($input)->save();
        }


        Session::flash('success', 'You have successfully edited your profile');

        return redirect()->back();
    }

    protected function deleteOldImage(): void
    {
        if (auth()->user()->profile_picture) {
            Storage::delete('/public/profile_pictures/' . auth()->user()->profile_picture);
        }
    }


    protected function removeProfileDetails($id)
    {
        $user = User::find($id);
        $user->characters()->detach($user->user_id);
        $user->delete();

        return redirect()->back();

    }

    protected function showCharacterList(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $characters = Character::with('users')->get();

        return view('user.characters.index', ['characters' => $characters]);
    }

    protected function createNewCharacterToList(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $characters = Character::with('users')->get();
        return view('user.characters.create', ['characters' => $characters]);
    }

    protected function storeNewCharacterToList(Request $request): \Illuminate\Http\RedirectResponse
    {

        if ($request->user()->characters()->find($request->input('character_id'))) {
            return redirect()->back()->withErrors(['errors' => 'You already own this character']);
        }

//        if (dd(CharacterUser::where('is_owned', true)->where('character_id', '=', $request->character_id)->toSql())) {
//            return redirect()->back()->withErrors(['errors' => 'You already own this character']);
//        }

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

    protected function editCharacterFromList($id)
    {
        $characterUser = CharacterUser::find($id);

        return view('user.characters.edit', ['characterUser' => $characterUser]);

    }

    protected function updateCharacterFromList(Request $request, $id)
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

    protected function removeCharacterFromList($id)
    {

        $characterUser = CharacterUser::find($id);
        $characterUser->delete();

        return redirect()->route('p:character_list')->with('success', 'Character removed from list.');
    }
}
