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
        <div class="px-2 rounded-lg">
            <div class="flex items-center pb-8">
                {{---todo temp img now need to fetch portrait aswel.--}}
                <img class="mb-3 shadow-lg hover:scale-[1.1]" src="{{$character->portrait}}" alt="Ico_img"/>
            </div>
        </div>

        <!-- Container -->
        <div class="container col-start-2 col-span-5 p-4 md:p-0">

            <!-- Card wrapper -->
            <div class="shadow-lg flex flex-wrap w-full lg:w-4/5">

                <!-- Card image -->
                <div class="md:bg-cover sm:bg-contain bg-bottom border w-full md:w-1/3 h-64 md:h-auto relative"
                     style="background-image:url({{$character->gachaCard}})">
                    <div class="absolute text-xl">
                        <i class="fa fa-heart text-white hover:text-red-light ml-4 mt-4 cursor-pointer"></i>
                    </div>
                </div>
                <!-- ./Card image -->

                <!-- Card body -->
                <div class="bg-white w-full md:w-2/3">
                    <!-- Card body - outer wrapper -->
                    <div class="h-full mx-auto px-6 md:px-0 md:pt-6 md:-ml-6 relative">
                        <!-- Card body - inner wrapper -->
                        <div
                            class="bg-white lg:h-full p-6 -mt-6 md:mt-0 relative mb-4 md:mb-0 flex flex-wrap md:flex-wrap items-center">
                            <!-- Card title and subtitle -->
                            <div class="w-full lg:w-1/5 lg:border-right lg:border-solid text-center md:text-left">
                                <h3>{{$character->name}}</h3>
                                <span style="color: {{$element_color[$character->vision]}}"
                                      class="text-sm font-bold ">{{$character->vision}}</span>
                                <p class="mb-0 mt-2 text-grey-dark text-sm italic">

                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $character->rarity)
                                            <i class='fas fa-star' style='color:#fad900'></i>
                                        @else
                                            <span class="fa-star"></span>
                                        @endif
                                    @endfor
                                </p>
                                <a href="" class="text-sm italic ">{{$character->weapon}}</a>
                                <hr class="w-1/4 md:ml-0 mt-4  border lg:hidden">
                            </div>
                            <!-- ./Card title and subtitle -->

                            <!-- Card description -->
                            <div class="w-full lg:w-3/5 lg:px-3">
                                <p class="text-md mt-4 lg:mt-0 text-justify md:text-left text-sm text-center">
                                    {{$character->description}}
                                </p>

                            </div>
                            <!-- ./Card description -->

                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden">
                                            <table class="min-w-full">
                                                <thead class="bg-white border-b">
                                                <tr>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Skill Talents
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Attack name
                                                    </th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach (($character->skillTalents) as $item)
                                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$item['unlock']}}</td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{$item['name']}}
                                                        </td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden">
                                            <table class="min-w-full">
                                                <thead class="bg-white border-b">
                                                <tr>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Passive Talents
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                       Passive Name
                                                    </th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach (($character->passiveTalents) as $talent)
                                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$talent['unlock']}}</td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{$talent['name']}}
                                                        </td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- ./Card body - inner wrapper -->
                    </div>
                    <!-- ./Card body - outer wrapper -->
                </div>
                <!-- ./Card body -->
@endsection
