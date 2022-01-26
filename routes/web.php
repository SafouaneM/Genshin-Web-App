<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
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

//todo auth prefix only admin is able to fetch (maybe i should remove this later on and just keep it as a cmd only?)
Route::get('/fetch', 'App\Http\Controllers\CharacterController@fetchCharacters');


Route::get('/characters', 'App\Http\Controllers\CharacterController@index')->name('characters');
Route::get('/characters/{id}', 'App\Http\Controllers\CharacterController@showInvidualCharacter');

