@extends('home.layout.default', ['title => Home'])




@section('video')
    <video class="" src="{{asset('storage/video/pagebg.mp4')}}" muted loop autoplay></video>
@endsection

@section('content')
    {{---todo grid here---}}
    <div style="background-image: url({{asset('storage/image/opacity_mondstadt.png')}})"
         class="bg-main-bg bg-gradient-to-r from-cyan-500 to-blue-500 bg-fixed object-fill">
        <div class="grid grid-cols-2 p-5 mt-3 rounded-lg">
            <div class="mt-12 text-lg font-bold text-center p-12 rounded-lg row-span-4">
                <img src="{{asset('storage/image/content.png')}}" class="scale-125 pt-10" alt="">
            </div>

            <div
                class="bg-violet-500 opacity-80 rounded overflow-hidden shadow-lg text-lg font-bold p-12 rounded-lg row-span-1">
                <h1 class="text-4xl text-amber-400 ">Hi Traveler, </h1>
                <p class="text-white p-2">Welcome to a Genshin Impact database full of information about your favorite characters,
                    locations, enemies and more...
                </p>
                <p class="text-white p-2">If you create an account you can also make use of the online character
                    list, which means you can add all the characters you own in Genshin Impact right here. You can also
                    for example write down some notes for that character, or you can keep track of their current
                    constellation
                </p>
            </div>

            <div
                class="mt-5 bg-violet-500 opacity-80 rounded overflow-hidden shadow-lg text-lg font-bold p-12 rounded-lg row-span-1">
                <h1 class="text-4xl text-amber-400 ">Features; </h1>
                <p class="text-white p-1">Here's a list of feature's you'll unlock on our Genshin Database, after creating an account.
                </p>
                <ul class="list-roman text-white p-6">
                    <li>Character list creator</li>
                    <li>Wish generator (wip)</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 p-5">
        <div class="bg-violet-400 text-lg font-bold text-center p-12 rounded-lg row-span-2">
            <h1 class="text-amber-300">So what are you waiting for? Let's explore :)</h1>
            <a href="{{route('characters')}}">
                <button class="rounded-full bg-amber-400 hover:bg-amber-600 text-white font-bold py-2 px-4">Characters
                </button>
            </a>
            <a href="">
                <button class="rounded-full bg-amber-400 hover:bg-amber-600 text-white font-bold py-2 px-4">Enemies
                </button>
            </a>
        </div>
    </div>
    <p>genshin.app isn’t endorsed by <a href="https://www.mihoyo.com">miHoYo</a> and doesn’t reflect the views or opinions of miHoYo or anyone officially involved in producing or managing
        <a href="https://genshin.mihoyo.com/en/">Genshin Impact.</a>
        Genshin Impact and miHoYo are trademarks or registered trademarks of miHoYo. <br>
        Genshin Impact © miHoYo.</p>




@endsection
