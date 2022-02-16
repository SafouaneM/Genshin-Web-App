@extends('home.layout.default', ['title => Home'])

@section('content')
    {{---todo i think i can extend the theme but lets cheat a bit i guess---}}
    <style>
        .p-12 {
            padding: 12rem;
        }
    </style>
    {{---todo style single card component and display all information with the help of accordion component --}}

    <div class="grid gap-3 space-x-5 lg:grid-cols-4 p-12 px-10">
        <div class="px-2 py-4 rounded-lg">
            <div class="flex items-center pb-8">
                {{---todo temp img now need to fetch portrait aswel.--}}
                <img class="mb-3 shadow-lg hover:scale-[1.1]" src="{{$character->portrait}}" alt="Ico_img"/>
            </div>
        </div>
        <div class="bg-violet-300 rounded-lg col-span-3">
            <div class="py-12">
            <img class="mb-3 shadow-lg h-64 " src="{{$character->gachaCard}}" alt="Ico_img"/>
            </div>
            <div class="flex flex-col items-center pb-8 ">
                {{---todo full bg of occupation foreach character.--}}
                <h3 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$character->name}}</h3>
                <p class="mb-1 font-medium text-gray-900 dark:text-white">{{$character->description}}</p>
                <span style="color: {{$element_color[$character->vision]}}"
                      class="text-sm font-bold ">{{$character->vision}}</span>
                <div class="flex mt-4 space-x-3 lg:mt-6">
                   Occupation: {{$character->nation}}
                    Rarity: {{$character->rarity}}
                    Affiliaton: {{$character->affiliation}}
                    weapon: {{$character->weapon}}
                    constellation: {{$character->constellation}}
                    birthday: {{$character->birthday}}
                </div>
                <div class="flex mt-4 space-x-3 lg:mt-6">


                </div>

            </div>
        </div>


    </div>





@endsection
