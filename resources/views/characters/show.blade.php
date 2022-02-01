@extends('home.layout.default', ['title => Home'])



@section('content')

    {{---todo i think i can extend the theme but lets cheat a bit i guess---}}
    <style>
        .p-12 {
            padding: 12rem;
        }
    </style>
    {{---todo style single card component and display all information with the help of accordion component --}}

    <div class="grid gap-8 space-x-5 lg:grid-cols-2 p-12 px-10">
        <div class="px-4 py-4 bg-violet-300 border-2 border-violet-500 rounded-lg">
            <div class="flex flex-col items-center pb-8">
                {{---todo temp img now need to fetch icons aswel.--}}
                <img class="mb-3 w-24 h-24 rounded-full shadow-lg" src="{{asset('img/mona.png')}}" alt="Ico_img"/>
                <h3 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$character->name}}</h3>
                {{---todo I think i can make this cleaner?--}}
                <span
                    class="text-sm font-bold text-gray-500 dark:text-{{$element_color[$character->vision] ?? ''}}">{{$character->vision}}</span>
                <div class="flex mt-4 space-x-3 lg:mt-6">
                    {{$character->nation}}
                </div>

            </div>
        </div>
    </div>





@endsection
