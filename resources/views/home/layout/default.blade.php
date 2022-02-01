
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Home</title>
</head>
<body class="bg-[#313765] bg-main-bg bg-no-repeat bg-contain">

<main class="app h-screen w-full md:w-11/12 m-auto">
    <nav class="flex flex-row justify-between bg-#313765 text-white p-7">
        <a href="/"><div class="px-10"></div></a>
        <div class="flex flex-row">

            <a href="{{route('characters')}}"><button class="mx-2 bg-amber-400 hover:bg-amber-600 rounded-lg px-5">Characters</button></a>
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

@yield('content')


</main>
</body>
</html>

