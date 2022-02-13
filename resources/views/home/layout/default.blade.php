<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('storage/image/favicon.ico')}}">
    <link rel="stylesheet" href="https://pagecdn.io/lib/font-awesome/5.10.0-11/css/all.min.css" integrity="sha256-p9TTWD+813MlLaxMXMbTA7wN/ArzGyW/L7c5+KkjOkM=" crossorigin="anonymous">
    <title>Home</title>
    <style>
        #loader {
            justify-content: center;
            align-items: center;
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            min-height: 100vh;
            padding: 0;
            margin: 0;
            z-index: 99999;
            background: #4b3588
        }
    </style>

</head>
<body class="bg-[#313765] bg-no-repeat bg-contain" onload="removeLoader()">
<div id="loader"><span class="text-green-500 " style="
    top: 50%; ">

    <i class="fas fa-circle-notch fa-spin fa-5x"></i>
  </span></div>

{{---todo find out why mix doesn't like my custom function (this is not the way i know but whatever for now :shrug:)---}}

<script>
    function removeLoader(){

        setTimeout(()=>{
                let loader = document.getElementById('loader');

                // hide the loader
                loader.style = 'display: none;';
            },
            500);
    }
</script>


<nav class="flex flex-row md:w-12/12 justify-between bg-[#4c5493] text-white p-5 sticky top-0 z-50">

    <div class="px-10"> <a href="/"> <span class="font-roboto text-2xl">Gensh.app</span> </a>
{{--        Todo! I got to figure out how I can autoplay the audio tag and make it able so that the user can mute/unmute--}}
        <button class="pl-3"><i class="text-xl fas fa-volume-mute "></i></button>
            </div>
    <div class="flex flex-row">
        <a href="{{route('characters')}}"><button class="mx-2 bg-amber-400 hover:bg-amber-600 rounded-lg px-5 ">Characters</button></a>
        <span class="mx-2">Enemies(wip)</span>
        @if (Route::has('login'))
            @auth
                <a href="{{url('/profile')}}"><button class="mx-2 bg-emerald-400 hover:bg-amber-600 rounded-lg px-5">Profile</button></a>
            @else
                <span class="mx-2"><a href="{{ route('login') }}" class="underline">Log in</a></span>

                @if (Route::has('register'))
                    <span class="mx-2"><a href="{{ route('register') }}" class="underline">Register</a></span>
                @endif
            @endauth
        @endif

    </div>
</nav>
<main class="app h-screen w-full md:w-11/12 m-auto">

@yield('video')
@yield('content')


</main>
</body>
</html>

