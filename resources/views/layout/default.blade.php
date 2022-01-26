
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Home</title>
</head>
<body class=" bg-cover bg-[#313765] bg-main-bg bg-no-repeat">
<div class="min-h-screen bg-main-bg">
<main class="app h-screen w-full md:w-11/12 m-auto">
    <nav class="flex flex-row justify-between bg-#313765 text-white p-7">
        <a href="/"><div class="px-10"></div></a>
        <div class="flex flex-row">
            <a href="{{route('characters')}}"><button class="mx-2 bg-amber-400 hover:bg-amber-600 rounded-lg px-5">Characters</button></a>
            <span class="mx-2">Enemies(wip)</span>
            <span class="mx-2">Profile(wip)</span>

        </div>
    </nav>

@yield('content')

</main>
</div>
</body>
</html>

