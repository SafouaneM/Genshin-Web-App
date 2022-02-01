<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Character\CharacterController;

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



Route::get('/characters', 'App\Http\Controllers\Character\CharacterController@index')->name('characters');
Route::get('/characters/{id}', 'App\Http\Controllers\Character\CharacterController@showInvidualCharacter');

//todo auth prefix only admin is able to fetch (i SHOULD 1000000% remove this later on and just keep it as a cmd only)
Route::get('/fetch', 'App\Http\Controllers\CharacterController@fetchCharacters')->middleware(['auth']);

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

require __DIR__.'/auth.php';
