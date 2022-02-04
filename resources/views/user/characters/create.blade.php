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
                    @if(auth()->user())

                        <div class="grid gap-8 space-x-5 lg:grid-cols-2 p-12 px-10">
                            <div class="flex flex-col items-center pb-8">

                                <form method="POST" action="{{route('p:character_list')}}">
                                    @csrf
                                    <h1 class="text-2xl bg-fuchsia-700 rounded-full border-violet-500 drop-shadow-lg p-2">
                                        Add a new character to your collection</h1>
                                    {{---todo temp img now need to implement profile picture ofc.--}}
                                    <img class="mt-6 mb-3 w-24 h-24 rounded-full shadow-lg"
                                         src="{{asset('img/mona.png')}}"
                                         alt="Ico_img"/>
                                    @foreach($errors->all() as $error)
                                        <p class="text-2xl bg-red-500 rounded-full border-y-red-800 drop-shadow-lg p-2">{{$error}}</p>
                                    @endforeach
                                    <select name="character_id" id="character_id"
                                            class="mt-5 mb-1 w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline ">
                                        {{--todo select 2 would look nicer :0--}}
                                        @foreach($characters as $character)
                                            <option value="{{$character->id}}" class="">{{$character->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="mt-1 block text-gray-700 text-sm font-bold mb-2" for="constellation">
                                        Constellation
                                    </label>
                                    <input
                                        class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="constellation" type="number" name="constelation" placeholder="Constellation">

                                    <label class="mt-1 block text-gray-700 text-sm font-bold mb-2" for="constellation">
                                        Notes
                                    </label>
                                    <textarea
                                        class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="note" name="note" type="text" maxLength="250" placeholder="Notes if you want"></textarea>

                                    <a href=""
                                       class="rounded-full bg-sky-600 hover:bg-sky-700 font-bold py-2 px-4 text-white p-6 justify-end">
                                        <button type="submit">Add Character</button>
                                    </a>
                                </form>
                            </div>

                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


