@extends('layout.default', ['title => Home'])



@section('content')

    {{---todo grid here---}}
    <div class="grid grid-cols-2 gap-4 p-5">
        <div class=" text-lg font-bold text-center p-10 rounded-lg row-span-2"></div>
        <div class="text-green-500 text-lg font-bold text-center p-10 rounded-lg"></div>
        <div class="p-10 row-span-2"></div>
        <div class=" text-lg font-bold text-center p-10 rounded-lg"></div>
        <div
            class=" bg-violet-500 hover:bg-violet-700 rounded overflow-hidden shadow-lg  text-lg font-bold p-12 rounded-lg row-span-2">
            <h1 class="text-4xl text-cyan-400 ">Hi Traveler,</h1>
            <p class="text-cyan-200">I hope I can show you a bit of the world of Tevat, with my web-application :)</p>
        </div>
        <div class="text-green-500 text-lg font-bold text-center p-12 rounded-lg row-span-2"></div>
        <div class="shadow-lg bg-violet-400 text-lg font-bold text-center p-12 rounded-lg row-span-2">
            <h1 class="text-amber-300">So what are you waiting for? Let's explore :)</h1>
            <a href="">
                <button class="rounded-full bg-amber-400 hover:bg-amber-600 text-white font-bold py-2 px-4">Characters
                </button>
            </a>
            <a href="">
                <button class="rounded-full bg-amber-400 hover:bg-amber-600 text-white font-bold py-2 px-4">Enemies
                </button>
            </a>
        </div>

    </div>




@endsection
