@extends('home.layout.default', ['title => Home'])



@section('content')

    {{---todo i think i can extend the theme but lets cheat a bit i guess---}}
    <style>
        .p-12 {
            padding: 12rem;
        }
    </style>
    {{---todo grid here---}}

    <div class="grid gap-8 space-x-1 lg:grid-cols-5 md:px-10">
        @foreach($characters as $key => $character)
            <div class="mt-12 px-4 py-4 bg-violet-300 border-2 border-violet-400 rounded-lg">
                <div class="flex flex-col items-center pb-8">

                    <img class="mb-3 w-24 h-24 rounded-full  shadow-lg" src="{{$character->icon}}" alt="Ico_img"/>


                    <h3 class="mb-1 text-xl font-medium text-gray-900  dark:text-white">{{$character->name}}</h3>
                    {{---todo I think i can make this cleaner?--}}

                    <span style="color: {{$element_color[$character->vision]}}"
                          class="text-sm font-bold ">{{$character->vision}}</span>
                    <div class="flex mt-4 space-x-3 lg:mt-6">
                        <a href="characters/{{$character->id}}"
                           class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Learn
                            more</a>
                        <a href="#"
                           class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-800">(Aquired!)</a>
                    </div>
                </div>
            </div>
        @endforeach
        {{$characters->links()}}
    </div>





@endsection
