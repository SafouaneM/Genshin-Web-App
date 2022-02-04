<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-violet-300 border-b border-violet-200 ">
                    <a href="{{route('p:create-character_list')}}">
                        <button
                            class="rounded-full bg-sky-600 hover:bg-sky-700 font-bold py-2 px-4 text-white p-6 justify-end">
                            Add new character to collection
                        </button>
                    </a>

                    @foreach($characters as $character)

                        @foreach($character->users as $user)

                            @if(isset ($user->pivot->is_owned))
                                <div class="grid gap-8 space-x-5 lg:grid-cols-2 p-12 px-10">
                                    <div class="flex flex-col items-center pb-8">
                                        {{---todo temp img now need to implement profile picture ofc.--}}

                                        <img class="mb-3 w-24 h-24 rounded-full shadow-lg"
                                             src="{{$character->icon}}"
                                             alt="Ico_img"/>

                                        <h3 class="mb-1 text-xl font-medium text-gray-900 ">{{$character->name}}</h3>

                                        <p class="mb-1 text-md font-medium text-gray-900 ">Owned
                                            by: {{$user->username}} </p>

                                        <p class="mb-1 text-md font-medium text-gray-900 ">
                                            Constellation: {{$user->pivot->constelation}}</p>
                                        <p class="mb-1 text-md font-medium text-gray-900 ">
                                            Note: {{$user->pivot->note}}</p>

                                    </div>
                                    <div class="flex flex-col mt-5 pb-8">
                                        <button
                                            class="rounded-full bg-emerald-600 hover:bg-emerald-700 font-bold py-2 px-4">
                                            Edit
                                        </button>
                                        <button
                                            class="rounded-full bg-rose-500 hover:bg-rose-700 font-bold py-2 px-4 mt-5">
                                            Remove
                                        </button>
                                    </div>
                                </div>

                            @endif
                        @endforeach
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</x-app-layout>


