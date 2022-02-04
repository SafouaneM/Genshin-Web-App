<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Character\CharacterController;
use App\Http\Controllers\User\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('home.index');
});

//Start Profile
//todo resource controller
Route::prefix('profile')->group(function () {
    Route::get('/', 'App\Http\Controllers\User\ProfileController@getProfileDetails')->middleware(['auth'])->name('profile');
    Route::get('/characterlist', 'App\Http\Controllers\User\ProfileController@showCharacterList')->middleware(['auth'])->name('p:character_list');
    Route::get('/characterlist/create', 'App\Http\Controllers\User\ProfileController@createNewCharacterToList')->middleware(['auth'])->name('p:create-character_list');
    Route::post('/characterlist', 'App\Http\Controllers\User\ProfileController@storeNewCharacterToList')->middleware(['auth'])->name('p:store-character_list');

});
//End profile

Route::get('/characters', 'App\Http\Controllers\Character\CharacterController@index')->name('characters');
Route::get('/characters/{id}', 'App\Http\Controllers\Character\CharacterController@showInvidualCharacter');


//todo auth prefix only admin is able to fetch (i SHOULD 1000000% remove this later on and just keep it as a cmd only)
Route::get('/fetch', 'App\Http\Controllers\Character\CharacterController@fetchCharacters')->middleware(['auth']);



require __DIR__.'/auth.php';
