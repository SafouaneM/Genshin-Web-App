
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="bg-cover bg-main-bg">
<main class="app h-screen w-full md:w-11/12 m-auto">
    <nav class="flex flex-row justify-between bg-#313765 text-white p-7">
        <a href="/"><div class="px-10"></div></a>
        <div class="flex flex-row">
            <a href="{{route('characters')}}"><span class="mx-2">Characters</span></a>
            <span class="mx-2">Enemies(wip)</span>
            <span class="mx-2">Profile(wip)</span>

        </div>
    </nav>

@yield('content')

</main>
</div>
</body>
</html>

