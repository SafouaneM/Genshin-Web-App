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
                        <form action="{{route('p:update-profile', [$user->id])}}" method="POST">
                            @method('PATCH')
                            @csrf
                        <div class="grid gap-8 space-x-5 lg:grid-cols-2 p-12 px-10">
                            @foreach($errors->all() as $error)
                                <p class="text-2xl bg-red-500 rounded-full border-y-red-800 drop-shadow-lg p-2">{{$error}}</p>
                            @endforeach
                            <div class="flex flex-col items-center pb-8">
                                {{---todo temp img now need to implement profile picture ofc.--}}
                                <img class="mb-3 w-24 h-24 rounded-full shadow-lg" src="{{asset('img/mona.png')}}"
                                     alt="Ico_img"/>
                                <label class="mt-1 block text-gray-700 text-sm font-bold mb-2" for="constellation">
                                    Username
                                </label>
                                <input
                                    class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="constellation" type="number" name="constelation" placeholder="Constellation">
                                <label class="mt-1 block text-gray-700 text-sm font-bold mb-2" for="constellation">
                                    Email
                                </label>
                                <input
                                    class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="constellation" type="number" name="constelation" placeholder="Constellation">
                                <label class="mt-1 block text-gray-700 text-sm font-bold mb-2" for="constellation">
                                    Adventure rank
                                </label>
                                <input
                                    class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="constellation" type="number" name="constelation" placeholder="Constellation">
                                <label class="mt-1 block text-gray-700 text-sm font-bold mb-2" for="constellation">
                                    Password
                                </label>
                                <input
                                    class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="constellation" type="number" name="constelation" placeholder="Constellation">
                                <label class="mt-1 block text-gray-700 text-sm font-bold mb-2" for="constellation">
                                    Verify Password
                                </label>
                                <input
                                    class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="constellation" type="number" name="constelation" placeholder="Constellation">
                            </div>

                        </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


