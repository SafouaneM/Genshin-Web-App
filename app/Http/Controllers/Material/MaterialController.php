<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class MaterialController extends Controller
{

    public function index()
    {

        return view('materials.index');

    }

}
