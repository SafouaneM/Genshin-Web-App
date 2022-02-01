<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
}
